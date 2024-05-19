<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:855',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if the user is authenticated using the seller guard
        if (Auth::guard('seller')->check()) {
            $sellerId = Auth::guard('seller')->id();

            $product = new Product([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'seller_id' => $sellerId,
            ]);
            $product->save();

            foreach ($request->file('images') as $imagefile) {
                $path = $imagefile->store('/images/resource', ['disk' => 'my_files']);
                $image = new Image([
                    'url' => $path,
                    'product_id' => $product->id,
                ]);
                $image->save();
            }

            return Redirect::route('seller.home')->with('success', 'Product added successfully.');
        } else {
            return redirect()->route('seller.auth.login')->with('error', 'You must be logged in as a seller to add a product.');
        }
    }

    public function getProducts()
    {
        $products = Product::with('images')->get();
        return view('show', ['products' => $products]);
    }

    public function getProduct($id)
    {
        $product = Product::with('images')->find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:855',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'images' => 'sometimes',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);
        if ($product) {
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            if ($request->hasFile('images')) {
                foreach ($product->images as $image) {
                    Storage::disk('my_files')->delete($image->url);
                    $image->delete();
                }

                foreach ($request->file('images') as $imagefile) {
                    $path = $imagefile->store('/images/resource', ['disk' => 'my_files']);
                    $image = new Image([
                        'url' => $path,
                        'product_id' => $product->id,
                    ]);
                    $image->save();
                }
            }

            return Redirect::route('seller.home')->with('success', 'Product updated successfully.');
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            foreach ($product->images as $image) {
                Storage::disk('my_files')->delete($image->url);
                $image->delete();
            }
            $product->delete();
            return Redirect::route('seller.home')->with('success', 'Product deleted successfully.');
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
