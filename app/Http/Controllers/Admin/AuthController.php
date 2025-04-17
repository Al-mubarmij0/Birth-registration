<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Handle the login attempt
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Get the credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the dashboard if successful
            return redirect()->route('admin.dashboard');
        }

        // Redirect back with error message if credentials are invalid
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Handle logout functionality
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
