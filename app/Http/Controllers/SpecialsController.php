<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Special;

class SpecialsController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'special' => 'required|string',
            'in_stock' => 'boolean',
        ]);


    // Set the default value for 'in_stock' if it's not present in the request
    $inStock = $request->has('in_stock') ? $request->input('in_stock') : false;

        // Create a new Flavor instance in the database
        Special::create([
            'special' => $request->input('special'),
            'in_stock' => $inStock,
        ]);

        // Redirect to the homepage with a success message
        return redirect()->route('dashboard')->with('success', 'Special added successfully!');
    }

    public function updateStock($id)
{
    // Use $id in your logic to update the stock
    // For example, you can use it to fetch the Flavor model by ID

    $special = Special::find($id);
    if ($special) {
        $special->in_stock = true;
        $special->save();
        }

        return redirect()->route('dashboard');
}

public function refreshStock($id) {
    $special = Special::find($id);
    if($special) {
        $special->in_stock = false;
        $special->save();
    }

        return redirect()->route('dashboard');
    
}
}
