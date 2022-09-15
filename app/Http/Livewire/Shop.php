<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\PromoSale;
use Illuminate\Support\Carbon;

class Shop extends Component
{

    public function addToCart($id)
    {
        $product = Product::find($id);

        $cart = session('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = (int)$cart[$id]['quantity'] + 1;
            session(['cart' => $cart]);
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->product_price,
                "photo" => $product->product_thumbnail
            ];
            session()->put('cart', $cart);
        }
    }

    public function render()
    {
        $products = null;
        $sale = PromoSale::all()->sortByDesc('id')->first();

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
            }
        }

        $sort = session('sortBy');
        $minPrice = 0;
        $maxPrice = 0;
        $products = Product::all();
        if (count($products) > 0) {
            $minPrice =  Product::all()->sortBy('product_price')->first()->product_price;
            $maxPrice = Product::all()->sortByDesc('product_price')->first()->product_price;
        }


        switch ($sort) {
            case 'Name': {
                    $products = Product::whereBetween('product_price', [$minPrice, $maxPrice])
                        ->orderBy('product_name', 'asc')->paginate(20);
                    break;
                }
            case 'HighToLow': {
                    $products = Product::whereBetween('product_price', [$minPrice, $maxPrice])
                        ->orderBy('product_price', 'desc')->paginate(20);
                    break;
                }
            case 'LowToHigh': {
                    $products = Product::whereBetween('product_price', [$minPrice, $maxPrice])
                        ->orderBy('product_price', 'asc')->paginate(20);
                    break;
                }
            default: {
                    $products = Product::whereBetween('product_price', [$minPrice, $maxPrice])
                        ->orderBy('id', 'desc')->paginate(20);
                    break;
                }
        }

        return view('livewire.shop')
            ->with('departments', Department::all()->where('department_status', '=', 'passed'))
            ->with('categories', Category::all()->where('category_status', '=', 'passed'))
            ->with('latests', Product::all()->sortByDesc('id')->take(9))
            ->with('products', $products)
            ->with('sale', $sale)
            ->with('min', $minPrice)
            ->with('max', $maxPrice);
    }
}
