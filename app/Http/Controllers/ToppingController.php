<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;
class ToppingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'topping' => 'required|string',
            'in_stock' => 'boolean',
        ]);


    // Set the default value for 'in_stock' if it's not present in the request
    $inStock = $request->has('in_stock') ? $request->input('in_stock') : false;

        // Create a new Flavor instance in the database
        Topping::create([
            'topping' => $request->input('topping'),
            'in_stock' => $inStock,
        ]);

        // Redirect to the homepage with a success message
        return redirect()->route('dashboard')->with('success', 'Topping added successfully!');
    }

    public function updateStock($id)
{
    // Use $id in your logic to update the stock
    // For example, you can use it to fetch the Flavor model by ID

    $topping = Topping::find($id);
    if ($topping) {
        $topping->in_stock = true;
        $topping->save();
        }

        return redirect()->route('dashboard');
}

public function refreshStock($id) {
    $topping = Topping::find($id);
    if($topping) {
        $topping->in_stock = false;
        $topping->save();
    }

        return redirect()->route('dashboard');
    
}
}
