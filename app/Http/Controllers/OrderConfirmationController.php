<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobileorder;

class OrderConfirmationController extends Controller
{
    public function loadConfirmation(Request $request) {
        $credentials = $request->validate([
            'orderTotal' => 'required',
            'orderDetails' => 'required',

        ]);
        $orderPrice = $request->input('orderTotal');
        $orderDetails = nl2br($request->input('orderDetails'));
        return view('orderConfirmation', ['orderTotal' => $orderPrice, 'orderDetails'=>$orderDetails]);
    }

    public function addOrder(Request $request) {
        $order = $request->input('finalOrderDetails');
        $price = $request->input('finalOrderTotal');
        $name = $request->input('customerName');

        Mobileorder::create([
            'price' => $price,
            'order' => $order,
            'customer_name' => $name
        ]);

        return response()->json(['success'=>true]);

    }

    public function runStripe(Request $request){
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $orderDetails = $request->get('finalOrderDetails');
        $cost = $request->get('finalOrderTotal');

        // Convert decimal value to cents (integer)
        $unitAmountCents = (int) round($cost * 100);

        try {
            $this->addOrder($request);
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $orderDetails,
                            ],
                            'unit_amount' => $unitAmountCents,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('successfulPayment'),
                'cancel_url' => route('mobileorders'),
            ]);

            return redirect()->away($session->url);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error('Stripe Exception: ' . $e->getMessage());
            // Handle the exception, return an error response, or redirect to an error page.
        }
    }

    public function successfulPayment() {
        $update = Mobileorder::latest()->first();
        $update->complete = false;
        $update->save();
        return view('success');
    }

    public function backToOrder(){
        return redirect()->route('mobileorders');
    }
}
