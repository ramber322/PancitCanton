<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Dashboard;


class CtchipsController extends Controller
{
    public function showChips() 
    {
        $chips = Product::where('Category', 'Chips')->get();
        return view('admin/ctchips', compact('chips'));
    }
}
