<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
    public function userHome()
    {
        $user = Auth::user();
        $products = Product::with('images', 'seller')->get();

        // Get the count of pending orders
        $pendingOrdersCount = Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->count();

        // Get the count of cart items
        $cart = Cart::where('user_id', Auth::id())->where('status', 'open')->first();
        $cartItemsCount = 0;
        if ($cart) {
            $cartItemsCount = $cart->cartItems()->count();
        }

        return view('user.home', compact('user', 'products', 'pendingOrdersCount', 'cartItemsCount'));
    }
}
