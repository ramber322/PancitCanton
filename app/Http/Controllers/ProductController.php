<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'productname' => 'required',
            'productprice' => 'required|numeric',
            'category' => 'required',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->Product_Name = $request->productname;
        $product->Price = $request->productprice;
        $product->Category = $request->category;
        // Save the product to the database
        $product->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Product added successfully.');
    }
}
