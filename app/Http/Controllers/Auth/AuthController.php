<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Register a new user
    public function register(Request $request)
    {
        // Validate user input
        $this->validator($request->all())->validate();

        // Create a new user based on the request data
        $this->create($request->all());

        // Redirect to the login page with a success message
        return redirect()->route('auth.login')->with('success', 'Registration successful!');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle custom login
    public function customLogin(Request $request)
    {
        // Validate user input and attempt login
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); // Check if "Remember Me" checkbox is checked
        if (Auth::attempt($credentials, $remember)) {
            // Authentication successful
            return redirect()->intended('/home');
        } else {
            // Authentication failed
            return redirect()->route('auth.login')->with('error', 'Invalid credentials');
        }
    }

    // Log out the user
    public function signOut(Request $request)
    {
        $remember = $request->filled('remember');

        Auth::logout(); // Log out the user

        if ($remember) {
            return redirect()->route('home');
        } else {
            return redirect()->route('index'); // Redirect to index.blade.php
        }
    }

    // Validator for registration
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobileNumber' => ['required', 'digits:11', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    // Create a new user
    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'middleName' => $data['middleName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'mobileNumber' => $data['mobileNumber'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
