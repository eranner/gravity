<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flavor;
use App\Models\Topping;

class HomeController extends Controller
{
   public function homeLoader() {
    $flavors = Flavor::orderBy('flavor', 'asc')->get();

    return view('dashboard', ['flavors' => $flavors]);
   }

   function homePage() {
    $flavors = Flavor::orderBy('flavor', 'asc')->get();;
    $toppings = Topping::orderBy('topping', 'asc')->get();


    return view('main', ['flavors' => $flavors, 'toppings' => $toppings]);
   }
}
