<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use App\Models\Social;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;

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
    return view('Layout.Home')
    ->with('settings', Setting::first())
    ->with('socials', Social::all())
    ->with('banners', Banner::first())
    ->with('departments', Department::all()->where('department_status', '=', 'passed'))
    ->with('categories', Category::all()->where('category_status', '=', 'passed'))
    ->with('products', Product::all())
    ->with('latests', Product::all()->sortByDesc('id')->take(9));
})->name('home');

Route::get('/shop', function () {
    return view('Layout.Shop');
})->name('shop');

Route::get('/shopdetails', function () {
    return view('Layout.Shop');
})->name('shopdetails');

Route::get('/cart', function () {
    return view('Layout.Shop');
})->name('cart');

Route::get('/checkout', function () {
    return view('Layout.Shop');
})->name('checkout');

Route::get('/blog', function () {
    return view('Layout.Shop');
})->name('blog');

Route::get('/blogs', function () {
    return view('Layout.Shop');
})->name('blogs');

Route::get('/contact', function () {
    return view('Layout.Shop');
})->name('contact');

