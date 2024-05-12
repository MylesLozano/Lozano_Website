<?php


use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/show', [ShowController::class, 'show'])->name('show');

Route::resource('/admin', AdminController::class);
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');


Route::get('/login/{type}', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login/{type}', [AuthController::class, 'customLogin'])->name('auth.custom.login');
Route::get('/signout/{type}', [AuthController::class, 'signOut'])->name('auth.signout');

Route::get('/register/{type}', [AuthController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('/register/{type}', [AuthController::class, 'register'])->name('auth.register.post');

Route::post('addProduct', [ProductController::class, 'addProduct'])->name('products.uploadproduct');
Route::get('products', [ProductController::class, 'getProducts'])->name('products.getProducts');
Route::get('product/{id}', [ProductController::class, 'getProduct'])->name('products.getProduct');
Route::post('updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('products.updateProduct');
Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('products.deleteProduct');
