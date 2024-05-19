<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'username' => ['required', 'string', 'max:255'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'balance' => 'nullable|numeric',
        'stud_id' => 'required',
    ]);

    // Ensure 'balance' and 'stud_id' are set to default values if they are not provided in the request
    $balance = $request->input('balance', 0);

    $user = User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'email' => $request->email,
        'balance' => $balance,
        'stud_id' => $request->stud_id,
    ]);

    // Set the value of 'card_id' to be the same as 'id'
    $user->card_id = $user->id;
    $user->save();

    event(new Registered($user));

    Auth::login($user);

    // Redirect to the dashboard after successful registration
    return redirect()->route('dashboard.testindex');
}
    
}
