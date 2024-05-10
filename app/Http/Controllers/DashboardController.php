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



}
