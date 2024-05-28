<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\NotificationBalance;
use App\Models\User;
use App\Models\Product;


class SalesController extends Controller
{
    public function index()
    {
        // Fetch data from the Notification table
        $notifications = Notification::all();
        $notificationsbalance = NotificationBalance::all();
        $products = Product::all();

        // Calculate total sales
        $totalSales = $notifications->sum(function ($notification) {
            return $notification->Price * $notification->Quantity;
        });

        // Pass total sales to the view
        $registeredUsersCount = User::count();


        $totalProducts = Product::count();



        $purchases = DB::table('notification')
        ->select('id', 'Product_Name', 'Price', 'Quantity', 'order_id', 'purchase_date', 'created_at')
        ->get();

        // Pass both total sales and registered users count to the view
        return view('admin.testad', compact('totalSales', 'registeredUsersCount','totalProducts','purchases','products','notificationsbalance'));
    }

    public function totalUsers()
    {
        // Count the number of registered users
        $registeredUsersCount = User::count();

        // Pass the count to the view
        return view('admin/testad', compact('registeredUsersCount'));
    }


    public function purchaseDetails($id)
{
    $purchases = DB::table('notification')
                 ->where('order_id', $id)
                 ->get();
    return response()->json($purchases);
}


}
