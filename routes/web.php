<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use App\Models\Social;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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
        ->with('products', Product::orderBy('id', 'desc')->paginate(20))
        ->with('latests', Product::all()->sortByDesc('id')->take(9));
})->name('home');

Route::get('/shop', function () {

    session()->put('sortBy', '');
    $minPrice =  Product::all()->sortBy('product_price')->first()->product_price;
    $maxPrice = Product::all()->sortByDesc('product_price')->first()->product_price;

    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'))
        ->with('latests', Product::all()->sortByDesc('id')->take(9))
        ->with('products', Product::orderBy('id', 'desc')->paginate(20))
        ->with('min', $minPrice)
        ->with('max', $maxPrice);
})->name('shop');

Route::get('shop/{sort}', function ($sort) {

    session()->put('sortBy', $sort);
    $minPrice =  Product::all()->sortBy('product_price')->first()->product_price;
    $maxPrice = Product::all()->sortByDesc('product_price')->first()->product_price;

    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'))
        ->with('latests', Product::all()->sortByDesc('id')->take(9))
        ->with('products', Product::orderBy('id', 'desc')->paginate(20))
        ->with('min', $minPrice)
        ->with('max', $maxPrice);
})->name('shopSort');

Route::post(
    'sortPriceRange',
    [ProductController::class, 'sort']
)->name('priceRange');

Route::get('shopdetails/{id}', function ($id) {
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'))
        ->with('product', Product::find($id));
})->name('shopdetails');

Route::post(
    'addReview',
    [ReviewController::class, 'create']
)->name('addReview');

Route::post(
    'deleteReview',
    [ReviewController::class, 'delete']
)->name('deleteReview');


Route::get('/cart', function () {
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'));
})->name('cart');

Route::get(
    'addToCart/{id}/{quantity}',
    [CartController::class, 'addToCart']
)->name('addToCart');


Route::get('/checkout', function () {
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'));
})->name('checkout');

Route::get('/blog', function () {
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'));
})->name('blog');

Route::get('/blogs', function () {
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'));
})->name('blogs');

Route::get('/contact', function () {
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'));
})->name('contact');


//login
Route::get('/welcome', function () {
    return view('welcome');
});

// Admin
Route::get('/admin', function () {
    return view('Layout.Admin.DashboardAdmin');
})->name('admin');
