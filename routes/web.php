<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('login', [AuthController::class, 'login_form'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//routes for registration 
Route::get('register', [AuthController::class, 'register_page'])->name('register');
Route::post('register', [AuthController::class, 'store_register'])->name('register');

Route::get('verification/{user}', [AuthController::class, 'verification_page'])->name('verification');
Route::post('verify-otp/{user}', [AuthController::class, 'verifyOtp'])->name('verify-otp');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('product', ProductController::class);
});
