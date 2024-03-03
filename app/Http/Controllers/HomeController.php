<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flavor;
use App\Models\Topping;
use App\Models\Softserve;
use App\Models\Shake;
use App\Models\Special;

class HomeController extends Controller
{
   public function homeLoader() {
    $flavors = Flavor::orderBy('flavor', 'asc')->get();
    $toppings = Topping::orderBy('topping', 'asc')->get();
    $shakes = Shake::orderBy('shake', 'asc')->get();

    $specials = Special::orderBy('special', 'asc')->get();
    $softServes = Softserve::orderBy('flavor', 'asc')->get();

    return view('dashboard', ['flavors' => $flavors, 'toppings'=>$toppings, 'shakes' => $shakes, 'specials' => $specials, 'softServes' => $softServes]);
   }

   function homePage() {
    $flavors = Flavor::orderBy('flavor', 'asc')->get();;
    $toppings = Topping::orderBy('topping', 'asc')->get();
    $softServes = Softserve::orderBy('flavor', 'asc')->get();
    $shakes = Shake::orderBy('shake', 'asc')->get();
    $specials = Special::orderBy('special', 'asc')->get();


    return view('main', ['flavors' => $flavors, 'toppings' => $toppings, 'softServes' => $softServes, 'shakes'=>$shakes, 'specials' => $specials]);
   }
}
