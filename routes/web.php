<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/{product}', [CartController::class, 'post'])->name('cart.add');
Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::view('/contact', 'contact')->name('contact');
Route::view('/profile', 'profile')->name('profile');
Route::view('/checkout', 'checkout')->name('checkout');
Route::view('/checkout/payment', 'checkout-payment')->name('checkout.payment');
Route::view('/checkout/review', 'checkout-review')->name('checkout.review');
Route::view('/order-success', 'order-success')->name('order.success');

Route::view('/admin/login', 'admin.login')->name('admin.login');
Route::view('/admin/logout', 'admin.logout')->name('admin.logout');
Route::view('/admin/products', 'admin.product-list')->name('admin.products.index');
Route::view('/admin/products/create', 'admin.create-product')->name('admin.products.create');
Route::view('/admin/products/edit', 'admin.edit-product')->name('admin.products.edit');

// auth pages for guests only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// logout only for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
