<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SellerAuthController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\SellerHomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;

/* <--- IndexController ---> */
Route::get('/', [IndexController::class, 'index'])->name('index');

/* <--- AdminController ---> */
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{admin}', [AdminController::class, 'show'])->name('admin.show');
Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
/* <--- AdminController ---> */

Route::get('/choose-role', function () {
    return view('choose-role');
})->name('choose-role');

/* <--- AuthController ---> */
Route::get('/login/user', [AuthController::class, 'showUserLoginForm'])->name('user.auth.login');
Route::post('/login/user', [AuthController::class, 'customUserLogin'])->name('user.auth.custom.login');
Route::get('/signout/user', [AuthController::class, 'signOutUser'])->name('user.auth.signout');
Route::get('/register/user', [AuthController::class, 'showUserRegistrationForm'])->name('user.auth.register');
Route::post('/register/user', [AuthController::class, 'registerUser'])->name('user.auth.register.post');
/* <--- AuthController ---> */

/* <--- UserHomeController ---> */
Route::get('/user/home', [UserHomeController::class, 'userHome'])->name('user.home');

/* <--- SellerHomeController ---> */
Route::get('/seller/home', [SellerHomeController::class, 'sellerHome'])->name('seller.home');

/* <--- SellerAuthController ---> */
Route::get('/login/seller', [SellerAuthController::class, 'showSellerLoginForm'])->name('seller.auth.login');
Route::post('/login/seller', [SellerAuthController::class, 'customSellerLogin'])->name('seller.auth.custom.login');
Route::get('/register/seller', [SellerAuthController::class, 'showSellerRegistrationForm'])->name('seller.auth.register');
Route::post('/register/seller', [SellerAuthController::class, 'registerSeller'])->name('seller.auth.register.post');
Route::get('/logout/seller', [SellerAuthController::class, 'signOutSeller'])->name('seller.auth.logout');
/* <--- SellerAuthController ---> */

/* <--- ProductController ---> */
Route::post('addProduct', [ProductController::class, 'addProduct'])->name('product.add');
Route::get('products', [ProductController::class, 'getProducts'])->name('products.showProducts');

Route::get('product/{id}', [ProductController::class, 'getProduct'])->name('products.getProduct');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'updateProduct'])->name('products.updateProduct');
Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('products.deleteProduct');
/* <--- ProductController ---> */

/* <--- Product Details for Users ---> */
Route::get('/user/product/{id}', [ProductController::class, 'showProduct'])->name('user.show');
/* <--- Product Details for Users ---> */

/* <--- ProductViewController ---> */
Route::get('products/view', [ProductViewController::class, 'productView'])->name('products.index');

/* <--- CartController ---> */
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
/* <--- CartController ---> */

/* <--- CategoryController ---> */
Route::get('/categories/sort/{order}', [CategoryController::class, 'sortCategories'])->name('categories.sort');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
/* <--- CategoryController ---> */

/* <--- OrderController ---> */
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
/* <--- OrderController ---> */


