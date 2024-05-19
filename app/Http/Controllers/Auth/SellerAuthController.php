<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class SellerAuthController extends Controller
{
    // Show the seller login form
    public function showSellerLoginForm()
    {
        return view('auth.login-seller');
    }

    // Handle the seller login process
    public function customSellerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('seller')->attempt($credentials)) {
            // Authentication successful, log in the seller
            Auth::guard('seller')->login(Auth::guard('seller')->user(), $request->remember);

            // Redirect to the intended page or seller dashboard
            return redirect()->intended('seller/home')->withSuccess('Logged in successfully');
        }

        // Authentication failed, redirect back to the login form with errors
        return redirect('login/seller')->withErrors('Login details are not valid');
    }


    // Sign out the seller
    public function signOutSeller()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.auth.login');
    }

    // Show the seller registration form
    public function showSellerRegistrationForm()
    {
        return view('auth.register-seller');
    }

    // Handle the seller registration process
    public function registerSeller(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers',
            'mobileNumber' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $seller = new Seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->mobileNumber = $request->mobileNumber;
        $seller->address = $request->address;
        $seller->password = Hash::make($request->password);
        $seller->save();

        Auth::guard('seller')->login($seller);

        return redirect()->route('seller.home')->withSuccess('Registered and logged in successfully');
    }
}

