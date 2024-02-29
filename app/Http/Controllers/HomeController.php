<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flavor;

class HomeController extends Controller
{
   public function homeLoader() {
    $flavors = Flavor::all();

    return view('home', ['flavors' => $flavors]);
   }
}
