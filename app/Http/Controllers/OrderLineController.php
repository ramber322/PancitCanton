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

    $orderedproduct = new OrderLine();
  
    $orderedproduct->Product_Name = $request->product_name;
    $orderedproduct->Price = $request->product_price;
    $orderedproduct->Quantity = 1; // You may adjust this as needed
    $orderedproduct->Product_ID = $request->product_id; // Use the correct Product_ID from the form
    $orderedproduct->save();

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}

}