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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
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

        if ($admins->isEmpty()) {
            return redirect()->route('admin.create');
        }

        return view('admin.index', compact('admins', 'users', 'images', 'products', 'sellers', 'orders', 'orderItems', 'carts', 'cartItems', 'reviews', 'categories'));
    }

    public function create()
    {
        if (Admin::exists()) {
            return redirect()->route('admin.login');
        }

        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => ['required', 'min:8', 'regex:/^[A-Z]{2}\d{4}---$/'],
        ], [
            'password.regex' => 'Password creation does not meet criteria',
        ]);

        Admin::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin created successfully.');
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
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.index');
        } else {
            return back()->withErrors([
                'name' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}
