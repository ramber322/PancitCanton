<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Userx;
use App\Models\User;
use App\Models\OrderLine;
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
        $user = $request->input('user'); // Get the user passed from the JavaScript code
        $totalCost = $request->input('total_cost');
    
        if ($user['balance'] >= $totalCost) {
            // Deduct the total cost from the user's balance
            $user['balance'] -= $totalCost;
            // Save the updated user data
            User::where('stud_id', $user['stud_id'])->update(['balance' => $user['balance']]);
            // Clear the order line table
            OrderLine::truncate();
    
            return response()->json(['success' => true, 'message' => 'Purchase successful']);
        } else {
            return response()->json(['success' => false, 'message' => 'Insufficient balance']);
        }
    }
}