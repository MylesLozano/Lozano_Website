<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::get("/", [IndexController::class, 'index'])->name('index');
Route::get("/home", [HomeController::class, 'home'])->name('home');
Route::get("/show", [ShowController::class, 'show'])->name('show');

Route::get("/login", [LoginController::class, 'login'])->name('login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

Route::get("/register", [RegisterController::class, 'register'])->name('register');
Route::post("/register", [RegisterController::class, 'register'])->name('register');
