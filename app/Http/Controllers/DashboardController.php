<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Dashboard;
use App\Models\OrderLine;


class DashboardController extends Controller
{
    public function showFoods()
    {
        $products = Product::where('Category', 'Foods')->get();
        $orderedproducts = OrderLine::all();
        return view('admin/dashboard', compact('products','orderedproducts'));
    }

    public function showChips() 
    {
        $chips = Product::where('Category', 'Chips')->get();
        $orderedproducts = OrderLine::all();
        return view('admin/ctchips', compact('chips', 'orderedproducts'));
    }

    public function showDrinks() 
    {
        $drinks = Product::where('Category', 'Drinks')->get();
        $orderedproducts = OrderLine::all();
        return view('admin/ctdrinks', compact('drinks','orderedproducts'));
    }


    public function login()
    {
        return view('dashboard');
    }













    public function showOrder() 
    {
        $orderedproducts = OrderLine::all();
        return view('admin/ctchips', compact('orderedproducts'));
    }

    public function removeItem($id)
    {
        $orderedproducts = OrderLine::find($id);
        $orderedproducts->delete();
    
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

 
    public function addQuantity($id)
{
    $orderedproduct = OrderLine::find($id);
    
    // Increase the quantity attribute
    $orderedproduct->Quantity += 1;

    // Save the changes
    $orderedproduct->save();

    return redirect()->back()->with('success', 'Quantity increased successfully.');
}

public function minusQuantity($id)
{
    $orderedproduct = OrderLine::find($id);
    
    // Get the current quantity
    $currentQuantity = $orderedproduct->Quantity;

    // Decrease the quantity attribute if it's greater than 1
    if ($currentQuantity > 1) {
        $currentQuantity -= 1;
    }

    // Update the quantity attribute
    $orderedproduct->Quantity = $currentQuantity;

    // Save the changes
    $orderedproduct->save();

    return redirect()->back()->with('success', 'Quantity decreased successfully.');
}


}
