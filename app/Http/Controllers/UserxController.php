<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Userx;
use App\Models\User;
use App\Models\OrderLine;
use App\Models\Notification;
class UserxController extends Controller
{
    public function displayUsers()
    {
        $users = User::all();
        return view('admin/users', compact('users'));
    }

    public function createUser(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'balance' => 'nullable|numeric',
            'stud_id' => 'required',
        ]);


        // Create a new product instance
        $users = new User();
        $users->username = $request->username;
        $users->password = Hash::make($request->password); // Hash the password using Laravel's Hash facade
        $users->email = $request->email;
        $users->balance = $request->balance;
        $users->stud_id = $request->stud_id;

        if ($users->balance === null) {
            $users->balance = 0;
        }






        // Save the product to the database
        $users->save();
        $users->card_id = $users->id;
        $users->save();
        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'User added successfully.');
    }

    public function validateStudent(Request $request)
    {
        $studentId = $request->input('student_id');
    
        $user = User::where('stud_id', $studentId)->first();
    


        if ($user) {
            // Fetch all orderlines associated with the user
            $orderLines = OrderLine::all();
          
            // Initialize total cost
            $totalCost = 0;
    
            $insertedProductNames = [];
            // Iterate through each order line and calculate total cost
            foreach ($orderLines as $orderLine) {
                

                // Calculate subtotal for each order line
                $subtotal = $orderLine->Price * $orderLine->Quantity;
                // Add subtotal to total cost
                $totalCost += $subtotal;
            }
    
            return response()->json([
                'success' => true,
                'user' => $user,
                'totalCost' => $totalCost
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student ID not found.'
            ]);
        }
    }
    public function purchase(Request $request) {
        $user = $request->input('user');
        $totalCost = $request->input('total_cost');
        $purchaseDate = Carbon::now()->toDateString();
    
        // Generate a unique order ID (using timestamp in this example)
        $orderId = time();
    
        if ($user['balance'] >= $totalCost) {
            $user['balance'] -= $totalCost;
            User::where('stud_id', $user['stud_id'])->update(['balance' => $user['balance']]);
    
            $orderLines = OrderLine::all();
            foreach ($orderLines as $orderLine) {
                $notification = new Notification();
                $notification->Product_Name = $orderLine->Product_Name;
                $notification->Price = $orderLine->Price;
                $notification->Quantity = $orderLine->Quantity;
                $notification->purchase_date = $purchaseDate;
                $notification->user_id = $user['id'];
                $notification->order_id = $orderId; // Associate the same order ID for all notifications
                $notification->save();
            }
    
            OrderLine::truncate();
        
            return response()->json(['success' => true, 'message' => 'Purchase successful']);
        } else {
            return response()->json(['success' => false, 'message' => 'Insufficient balance']);
        }
    }
    public function getUserBalance($id)
    {
        $user = User::findOrFail($id);
        return view('admin/users', compact('user'));
    }
    

    public function addBalance(Request $request, $id) {
        $user = User::find($id);

        $user->balance += $request->input('balance');
    
        // Find the user by ID
       
    
        
    
        // Update the user's balance
     
        $user->update();
    
        // Return a success response
        return response()->json(['message' => 'Balance added successfully', 'new_balance' => $user->balance]);
    }



    public function updateBalance(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'userId' => 'required|exists:users,id',
            'balance' => 'required|numeric|min:0',
        ]);

        // Find the user
        $user = User::findOrFail($request->input('userId'));

        // Update the user's balance
        $user->balance += $request->input('balance');
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Balance updated successfully');
    }

}