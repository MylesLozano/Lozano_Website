<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
        ]);

        $product = Product::find($request->product_id);

        if (!$product || $product->quantity < $request->quantity) {
            return redirect()->back()->with('error', 'Insufficient product quantity.');
        }

        $order = new Order([
            'user_id' => Auth::id(),
            'total_price' => $product->price * $request->quantity,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address,
        ]);
        $order->save();

        $orderItem = new OrderItem([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price,
        ]);
        $orderItem->save();

        $product->quantity -= $request->quantity;
        $product->save();

        return redirect()->route('order.success')->with('success', 'Order placed successfully.');
    }

    public function orderSuccess()
    {
        return view('order.success');
    }
}

