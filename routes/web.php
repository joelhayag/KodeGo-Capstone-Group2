<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Layout.FrontEnd.Home');
})->name('home');

Route::get('/shop', function () {
    return view('Layout.FrontEnd.Shop');
})->name('shop');

Route::get('/shopdetails', function () {
    return view('Layout.FrontEnd.Shop');
})->name('shopdetails');

Route::get('/cart', function () {
    return view('Layout.FrontEnd.Shop');
})->name('cart');

Route::get('/checkout', function () {
    return view('Layout.FrontEnd.Shop');
})->name('checkout');

Route::get('/blog', function () {
    return view('Layout.FrontEnd.Shop');
})->name('blog');

Route::get('/blogs', function () {
    return view('Layout.FrontEnd.Shop');
})->name('blogs');

Route::get('/contact', function () {
    return view('Layout.FrontEnd.Shop');
})->name('contact');

