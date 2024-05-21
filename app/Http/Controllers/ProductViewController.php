<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductViewController extends Controller
{
    public function productView()
    {
        $products = Product::all();
        return view('seller.show', compact('products'));
    }
}
