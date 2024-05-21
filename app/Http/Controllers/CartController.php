<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id(), 'status' => 'open']);
        $cartItem = $cart->cartItem()->where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            $cartItem = new CartItem([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
            $cartItem->save();
        }

        // Redirect to the cart view after adding to the cart
        return redirect()->route('cart.view')->with('success', 'Product added to cart.');
    }

    public function updateCartItem(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cart item updated successfully.');
    }

    public function removeFromCart(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    public function viewCart()
    {
        $cart = Cart::where('user_id', Auth::id())->where('status', 'open')->with('cartItem.product')->first();
        return view('cart.view', compact('cart'));
    }

    public function clearCart()
    {
        $cart = Cart::where('user_id', Auth::id())->where('status', 'open')->first();
        $cart->cartItem()->delete();

        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }
}
