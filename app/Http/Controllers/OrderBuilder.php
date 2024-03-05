<?php

namespace App\Http\Controllers;
use App\Models\Flavor;
use App\Models\Topping;
use App\Models\Softserve;
use App\Models\Shake;
use App\Models\Special;

use Illuminate\Http\Request;

class OrderBuilder extends Controller
{
    public function loadBuilder() {
        $flavors = Flavor::orderBy('flavor', 'asc')->get();
        $toppings = Topping::orderBy('topping', 'asc')->get();
        $softServes = Softserve::orderBy('flavor', 'asc')->get();
        $shakes = Shake::orderBy('shake', 'asc')->get();
        $specials = Special::orderBy('special', 'asc')->get();
        return view('mobileOrder', ['flavors' => $flavors, 'toppings' =>$toppings, 'softServes' =>$softServes, 'shakes' => $shakes, 'specials'=> $specials]);
    }
}
