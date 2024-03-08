<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobileorder;

class OrderFillerController extends Controller
{
    public function index(){
        $orders = Mobileorder::orderBy('created_at', 'asc')->get();
        $empty = Mobileorder::where('complete', false)->get();

        return view('orderFiller', ['orders'=> $orders, 'empty'=>$empty]);
    }

    public function complete($id) {
        $order = Mobileorder::find($id);
    if ($order) {
        $order->complete = true;
        $order->save();
        }

        return redirect()->route('orderFiller');
    }
}
