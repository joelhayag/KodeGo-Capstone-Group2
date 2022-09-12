<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\PromoSale;
use Illuminate\Support\Carbon;

class ProductInCart extends Component
{
    public function updateCart($id, $type)
    {
        $product = Product::find($id);

        $cart = session('cart');

        if (isset($cart[$id])) {
            if($type == 'add')
                $cart[$id]['quantity'] = (int)$cart[$id]['quantity'] + 1;
            else{
                if(((int)$cart[$id]['quantity'] - 1) > -1){
                    $cart[$id]['quantity'] = (int)$cart[$id]['quantity'] - 1;
                }
            }

            session(['cart' => $cart]);
        }
    }

    public function deleteItemInCart($id){
        $cart = session('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }
    public function render()
    {
        $sale = PromoSale::all()->sortByDesc('id')->first();

        if ($sale) {
            $end_date = Carbon::parse($sale->sale_start_date);

            $current = Carbon::now();
            $length = $current->diffInDays($end_date, false);

            if($length < 1){
                $end_date = Carbon::parse($sale->sale_end_date);
                $length = $current->diffInDays($end_date, false);

                if($length < 0){
                    $sale = null;
                }
            }
        }

        return view('livewire.product-in-cart')
        ->with('products', session('cart'))
        ->with('sale', $sale);
    }
}
