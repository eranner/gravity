<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shake;
class ShakeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'shake' => 'required|string',
            'in_stock' => 'boolean',
        ]);


    // Set the default value for 'in_stock' if it's not present in the request
    $inStock = $request->has('in_stock') ? $request->input('in_stock') : false;

        // Create a new Flavor instance in the database
        Shake::create([
            'shake' => $request->input('shake'),
            'in_stock' => $inStock,
        ]);

        // Redirect to the homepage with a success message
        return redirect()->route('dashboard')->with('success', 'Shake added successfully!');
    }

    public function updateStock($id)
{
    // Use $id in your logic to update the stock
    // For example, you can use it to fetch the Flavor model by ID

    $shake = Shake::find($id);
    if ($shake) {
        $shake->in_stock = true;
        $shake->save();
        }

        return redirect()->route('dashboard');
}

public function refreshStock($id) {
    $shake = Shake::find($id);
    if($shake) {
        $shake->in_stock = false;
        $shake->save();
    }

        return redirect()->route('dashboard');
    
}
}
