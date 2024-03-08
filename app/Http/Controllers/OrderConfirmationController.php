<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobileorder;

class OrderConfirmationController extends Controller
{
    public function loadConfirmation(Request $request) {
        $orderPrice = $request->input('orderTotal');
        $orderDetails = nl2br($request->input('orderDetails'));
        return view('orderConfirmation', ['orderTotal' => $orderPrice, 'orderDetails'=>$orderDetails]);
    }

    public function addOrder(Request $request) {
        $order = $request->input('finalOrderDetails');
        $price = $request->input('finalOrderTotal');

        Mobileorder::create([
            'price' => $price,
            'order' => $order
        ]);

        return redirect()->route('mobileorders');

    } 
}
