<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $count = 0;

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
        return view(
            'livewire.product'
        )->with('products', Product::all());
    }
}
