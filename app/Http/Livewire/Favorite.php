<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\PromoSale;
use Illuminate\Support\Carbon;

class Favorite extends Component
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
    public function addToFavorite($id)
    {
        $product = Product::find($id);

        $favorite = session('favorite');

        if (isset($favorite[$id])) {
        } else {
            $favorite[$id] = $product;
            session()->put('favorite', $favorite);
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

        $favorites = session('favorite');
        if($favorites != null){
            $products = $favorites;
        }



        return view('livewire.favorite')
            ->with('departments', Department::all()->where('department_status', '=', 'passed'))
            ->with('categories', Category::all()->where('category_status', '=', 'passed'))
            ->with('latests', Product::all()->sortByDesc('id')->take(9))
            ->with('products', $products)
            ->with('sale', $sale);
    }
}
