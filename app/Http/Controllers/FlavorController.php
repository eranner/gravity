<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use Illuminate\Http\Request;

class FlavorController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'flavor' => 'required|string',
            'in_stock' => 'boolean',
        ]);


    // Set the default value for 'in_stock' if it's not present in the request
    $inStock = $request->has('in_stock') ? $request->input('in_stock') : false;

        // Create a new Flavor instance in the database
        Flavor::create([
            'flavor' => $request->input('flavor'),
            'in_stock' => $inStock,
        ]);

        // Redirect to the homepage with a success message
        return redirect()->route('dashboard')->with('success', 'Flavor added successfully!');
    }

    public function updateStock($id)
{
    // Use $id in your logic to update the stock
    // For example, you can use it to fetch the Flavor model by ID

    $flavor = Flavor::find($id);
    if ($flavor) {
        $flavor->in_stock = true;
        $flavor->save();
        }

        return redirect()->route('dashboard');
}

public function refreshStock($id) {
    $flavor = Flavor::find($id);
    if($flavor) {
        $flavor->in_stock = false;
        $flavor->save();
    }

        return redirect()->route('dashboard');
    
}
}
