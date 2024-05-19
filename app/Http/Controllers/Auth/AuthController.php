<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Show the user login form
    public function showUserLoginForm()
    {
        return view('auth.login');
    }

    // Handle the user login process
    public function customUserLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('user/home')->withSuccess('Logged in successfully');
        }

        return redirect('login/user')->withErrors('Login details are not valid');
    }

    // Sign out the user
    public function signOutUser()
    {
        Auth::logout();
        return redirect()->route('user.auth.login');
    }

    // Show the user registration form
    public function showUserRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the user registration process
    public function registerUser(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobileNumber' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->middleName = $request->middleName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->mobileNumber = $request->mobileNumber;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('user.home')->withSuccess('Registered and logged in successfully');
    }
}
