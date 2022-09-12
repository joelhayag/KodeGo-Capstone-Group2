<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

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
        return view('livewire.product-in-cart')
        ->with('products', session('cart'));
    }
}
