<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::get("/", [IndexController::class, 'index'])->name('index');
Route::get("/home", [HomeController::class, 'home'])->name('home');
Route::get("/show", [ShowController::class, 'show'])->name('show');
Route::get("/login", [LoginController::class, 'login'])->name('login');
Route::get("/register", [RegisterController::class, 'register'])->name('register');
