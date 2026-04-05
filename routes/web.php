<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/cart', 'cart')->name('cart');
Route::view('/product', 'product')->name('product');
Route::view('/login', 'login')->name('login');
Route::view('/shop', 'shop')->name('shop');
Route::view('/contact', 'contact')->name('contact');
Route::view('/register', 'register')->name('register');
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
