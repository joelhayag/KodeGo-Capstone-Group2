<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class RelatedProducts extends Component
{
    public $product_id;

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
            session(['cart' => $cart]);
        }
    }

    public function render()
    {
        return view('livewire.related-products')
        ->with('product', Product::find($this->product_id));
    }
}
