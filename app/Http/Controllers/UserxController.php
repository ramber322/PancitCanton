<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Userx;
use App\Models\User;

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
            // Calculate the total cost here, I'll use a fixed value for demonstration
            $totalCost = 8700;
    
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
    


}
