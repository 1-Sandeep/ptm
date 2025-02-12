<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * If the user is already logged in, redirect to the dashboard.
     */
    public function login()
    {
        // If the user is logged in, redirect to the dashboard.
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Otherwise, show the login form.
        return view('auth.login');
    }

    /**
     * Show the registration form.
     *
     * If the user is already logged in, redirect to the dashboard.
     */
    public function register()
    {
        // If the user is logged in, redirect to the dashboard.
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Otherwise, show the registration form.
        return view('auth.register');
    }

    /**
     * Handle the registration of a new user.
     *
     * Create a new user and redirect them to the login page with a success message.
     */
    public function store(RegisterRequest $request)
    {
        // Get the validated data from the form.
        $validated = $request->validated();

        // Create a new user in the database with the validated data.
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash the password for security.
        ]);

        // Flash a success message to let the user know their registration was successful.
        session()->flash('success', 'Registration successful! Please log in.');

        // Redirect to the login page.
        return redirect()->route('login');
    }

    /**
     * Handle the login of an existing user.
     *
     * If the login is successful, redirect to the dashboard.
     * If the login fails, return back with an error message.
     */
    public function authenticate(LoginRequest $request)
    {
        // Validate the login request data.
        $validated = $request->validated();

        // Attempt to log the user in with the provided credentials.
        $loginSuccess = Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        // If authentication fails, return the user back to the login form with an error message.
        if (!$loginSuccess) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        // Flash a success message to the session
        session()->flash('success', 'You have logged in successfully!');

        // If authentication is successful, redirect the user to the dashboard.
        return redirect()->route('dashboard');
    }


    /**
     * Log the user out and redirect them to the login page with a success message.
     */
    public function logout()
    {
        // Log out the user.
        Auth::logout();

        // Flash a success message to let the user know they have logged out successfully.
        session()->flash('success', 'Successfully logged out!');

        // Redirect to the login page.
        return redirect()->route('login');
    }
}
