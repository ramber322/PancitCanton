<?php

namespace App\Http\Controllers;

//newly added
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Dashboard;
use App\Models\OrderLine;
use App\Models\Notification;

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




public function testindex()
{
    $userId = Auth::id();
    
    // Fetch all purchases for the authenticated user
    $purchases = DB::table('notification')
                 ->where('user_id', $userId)
                 ->select('id', 'Product_Name', 'Price', 'Quantity', 'order_id', 'purchase_date', 'created_at')
                 ->get();
    
    // Fetch the most recent purchase for the authenticated user
    $latestPurchase = DB::table('notification')
                        ->where('user_id', $userId)
                        ->orderBy('created_at', 'desc') 
                        ->first();
    return view('dashboard', ['purchases' => $purchases, 'latestPurchase' => $latestPurchase]);
}

public function purchaseDetails($id)
{
    $purchases = DB::table('notification')
                 ->where('order_id', $id)
                 ->get();
    return response()->json($purchases);
}
//new


public function getTodayProducts()
{
    $userId = Auth::id();
    $todayProducts = Notification::where('user_id', $userId)
                        ->whereDate('purchase_date', Carbon::today())
                        ->get(['Product_Name', 'Price', 'Quantity']);
    return response()->json($todayProducts);
}


}
