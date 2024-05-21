<?php

namespace App\Http\Controllers;

use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('index', ['products' => $products]);  // Pass products to the view
    }
}
