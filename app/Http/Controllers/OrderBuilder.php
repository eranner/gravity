<?php

namespace App\Http\Controllers;
use App\Models\Flavor;
use App\Models\Topping;
use App\Models\Softserve;

use Illuminate\Http\Request;

class OrderBuilder extends Controller
{
    public function loadBuilder() {
        $flavors = Flavor::orderBy('flavor', 'asc')->get();
        $toppings = Topping::orderBy('topping', 'asc')->get();
        $softServes = Softserve::orderBy('flavor', 'asc')->get();
        return view('mobileOrder', ['flavors' => $flavors, 'toppings' =>$toppings, 'softServes' =>$softServes]);
    }
}
