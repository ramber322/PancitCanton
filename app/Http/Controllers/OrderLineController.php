<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderLine;

class OrderLineController extends Controller
{
    public function showOrder() 
    {
        $orderedproducts = OrderLine::all();
        return view('admin.ctchips', compact('orderedproducts'));
    }

    public function addToCart(Request $request)
    {
        // Validate the request data here if needed

        $existingProduct = OrderLine::where('Product_ID', $request->product_id)->first();

        if ($existingProduct) {
            // Product already exists, update the quantity
            $existingProduct->increment('Quantity');
        } else {
            // Product doesn't exist, create a new entry
            $orderedproduct = new OrderLine();
            $orderedproduct->Product_Name = $request->product_name;
            $orderedproduct->Price = $request->product_price;
            $orderedproduct->Quantity = 1; // Initial quantity
            $orderedproduct->Product_ID = $request->product_id; // Use the correct Product_ID from the form
            $orderedproduct->save();
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


}