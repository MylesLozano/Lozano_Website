<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // If there are no admins in the database, redirect to the 'create' view
        if (Admin::count() == 0) {
            return redirect()->route('admin.create');
        }

        // If there is at least one admin in the database and an admin is not logged in, redirect to the 'login' view
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        // If an admin is logged in, show the 'index' view
        $admins = Admin::all();
        $users = User::all();
        $images = Image::all();
        $products = Product::all();
        $sellers = Seller::all();
        $orders = Order::all();
        $orderItems = OrderItem::all();
        $carts = Cart::all();
        $cartItems = CartItem::all();
        $reviews = Review::all();
        $categories = Category::all();

        return view('admin.index', compact('admins', 'users', 'images', 'products', 'sellers', 'orders', 'orderItems', 'carts', 'cartItems', 'reviews', 'categories'));
    }




    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validateAdminRequest($request);

        Admin::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin created successfully.');
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $this->validateAdminRequest($request);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        // Redirect to the login page after deleting an admin
        return redirect()->route('admin.login')->with('success', 'Admin deleted successfully.');
    }


    public function showLoginForm()
    {
        // If no admin exists in the database, redirect to the 'create' view
        if (Admin::count() == 0) {
            return redirect()->route('admin.create');
        }

        // If an admin exists but is not logged in, show the 'login' view
        if (!Auth::guard('admin')->check()) {
            return view('admin.login');
        }

        // If an admin is logged in, redirect to the 'index' view
        return redirect()->route('admin.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // If the login is successful, redirect to the 'index' view
            $admins = Admin::all();
            $users = User::all();
            $images = Image::all();
            $products = Product::all();
            $sellers = Seller::all();
            $orders = Order::all();
            $orderItems = OrderItem::all();
            $carts = Cart::all();
            $cartItems = CartItem::all();
            $reviews = Review::all();
            $categories = Category::all();

            return view('admin.index', compact('admins', 'users', 'images', 'products', 'sellers', 'orders', 'orderItems', 'carts', 'cartItems', 'reviews', 'categories'));
        } else {
            return back()->withErrors([
                'name' => 'The provided credentials do not match our records.',
            ]);
        }
    }


    private function validateAdminRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => ['required', 'min:8', 'regex:/^[A-Z]{2}\d{4}---$/'],
        ], [
            'password.regex' => 'Password creation does not meet criteria',
        ]);
    }
}
