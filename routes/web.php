<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use App\Models\Social;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\PromoSale;

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactUsMailController;
use App\Http\Controllers\ProceedCheckoutController;
use App\Http\Controllers\AppUserController;

use Illuminate\Support\Carbon;

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
    $minPrice = 0;
    $maxPrice = 0;
    $products = Product::all();
    if (count($products) > 0) {
        $minPrice =  Product::all()->sortBy('product_price')->first()->product_price;
        $maxPrice = Product::all()->sortByDesc('product_price')->first()->product_price;
    }

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
    $minPrice = 0;
    $maxPrice = 0;
    $products = Product::all();
    if (count($products) > 0) {
        $minPrice =  Product::all()->sortBy('product_price')->first()->product_price;
        $maxPrice = Product::all()->sortByDesc('product_price')->first()->product_price;
    }

    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'))
        ->with('latests', Product::all() ? Product::all()->sortByDesc('id')->take(9) : null)
        ->with('products', Product::all() ? Product::orderBy('id', 'desc')->paginate(20) : null)
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

Route::get('/favorites', function () {
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'));
})->name('favorites');

Route::get('/checkout', function () {

    $carts = session('cart');
    $sale_discount =  session('sale_discount');
    $coupon_discount = session('coupon_discount');
    $total =  session('total');

    $sale = PromoSale::all()->sortByDesc('id')->first();

    foreach ((array) $carts as $key => $cart) {
        if ($sale) {
            $end_date = Carbon::parse($sale->sale_start_date);

            $current = Carbon::now();
            $length = $current->diffInDays($end_date, false);

            if ($length < 1) {
                $end_date = Carbon::parse($sale->sale_end_date);
                $length = $current->diffInDays($end_date, false);

                if ($length < 0) {
                    $sale = null;
                }
            } else {
                $sale = null;
            }
        }
        $carts[$key]['price'] = $sale ? ($cart['price'] - ($cart['price'] * ($sale->sale_percentage / 100))) * $cart['quantity'] : $cart['price'];
    }

    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'))
        ->with('products', $carts)
        ->with('amount', [
            'sale_discount' => $sale_discount,
            'coupon_discount' => $coupon_discount,
            'total' => $total
        ])
        ->with('error', session('error'));
})->name('checkout');

Route::post(
    'proceedCheckout',
    [ProceedCheckoutController::class, 'checkout']
)->name('proceedCheckout');

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

Route::post(
    '/contactSendEmail',
    [ContactUsMailController::class, 'sendEmail']
)->name('sendEmail');

//login
Route::post(
    '/login',
    [AppUserController::class, 'login']
)->name('login');
Route::get('/orders', function () {
    $id = session('longIn_user');
    if ($id == null) {
        return redirect('/');
    }
    return view('Layout.Shop')
        ->with('settings', Setting::first())
        ->with('socials', Social::all())
        ->with('departments', Department::all()->where('department_status', '=', 'passed'))
        ->with('categories', Category::all()->where('category_status', '=', 'passed'));
})->name('orders');



// Admin
Route::get('/admin', function () {
    return view('Layout.Admin.Admin');
})->name('admin');

Route::get('/admin-products', function () {
    return view('Layout.Admin.Admin');
})->name('admin-products');

Route::get('/admin-orders', function () {
    return view('Layout.Admin.Admin');
})->name('admin-orders');

Route::get('/admin-customers', function () {
    return view('Layout.Admin.Admin');
})->name('admin-customers');

Route::get('/admin-statistics', function () {
    return view('Layout.Admin.Admin');
})->name('admin-statistics');

Route::get('/admin-admins', function () {
    return view('Layout.Admin.Admin');
})->name('admin-admins');

Route::get('/admin-settings', function () {
    return view('Layout.Admin.Admin');
})->name('admin-settings');