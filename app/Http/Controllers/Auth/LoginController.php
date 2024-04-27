<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
        // Display the login form
    }

    public function customLogin(Request $request)
    {
        // Validate user input and attempt login
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/home');
        } else {
            // Authentication failed
            return redirect()->route('login.index')->with('error', 'Invalid credentials');
        }
    }

    public function signOut()
    {
        Auth::logout(); // Log out the user
        return redirect('/');
    }
}
