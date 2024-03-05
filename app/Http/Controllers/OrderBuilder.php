<?php

namespace App\Http\Controllers;
use App\Models\Flavor;

use Illuminate\Http\Request;

class OrderBuilder extends Controller
{
    public function loadBuilder() {
        $flavors = Flavor::orderBy('flavor', 'asc')->get();
        return view('mobileOrder', ['flavors' => $flavors]);
    }
}
