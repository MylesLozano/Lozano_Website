<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShowController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SellerAuthController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\SellerHomeController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/show', [ShowController::class, 'show'])->name('show');

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

Route::get('products', [ProductViewController::class, 'productView'])->name('products.index');
/* <--- ProductController ---> */
Route::post('addProduct', [ProductController::class, 'addProduct'])->name('product.add');
Route::get('products', [ProductController::class, 'getProducts'])->name('products.getProducts');
Route::get('product/{id}', [ProductController::class, 'getProduct'])->name('products.getProduct');
Route::post('updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('products.updateProduct');
Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('products.deleteProduct');
/* <--- ProductController ---> */
