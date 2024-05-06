<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include any CSS files or CDN links for styling -->
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="username">Username</label>
            <input id="username" class="block mt-1 w-full" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username">
            <!-- Display validation errors for username -->
            @error('username')
                <div class="mt-2 text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            <!-- Display validation errors for email -->
            @error('email')
                <div class="mt-2 text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Password</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
            <!-- Display validation errors for password -->
            @error('password')
                <div class="mt-2 text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
            <!-- Display validation errors for password confirmation -->
            @error('password_confirmation')
                <div class="mt-2 text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Balance -->
        <div class="mt-4">
            <label for="balance">Balance</label>
            <input id="balance" class="block mt-1 w-full" type="number" name="balance" value="{{ old('balance') }}">
            <!-- Display validation errors for balance -->
            @error('balance')
                <div class="mt-2 text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Student ID -->
        <div class="mt-4">
            <label for="stud_id">Student ID</label>
            <input id="stud_id" class="block mt-1 w-full" type="text" name="stud_id" value="{{ old('stud_id') }}">
            <!-- Display validation errors for student ID -->
            @error('stud_id')
                <div class="mt-2 text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Register button -->
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Already registered?</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md ml-4">Register</button>
        </div>
    </form>
    <!-- Include any JavaScript files or CDN links for functionality -->
</body>
</html>
