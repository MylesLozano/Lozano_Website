<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SellerHomeController extends Controller
{
    public function sellerHome()
    {
        $seller = Auth::guard('seller')->user();
        $products = Product::where('seller_id', $seller->id)->with('images')->get();
        return view('seller.home', compact('seller', 'products'));
    }
}

