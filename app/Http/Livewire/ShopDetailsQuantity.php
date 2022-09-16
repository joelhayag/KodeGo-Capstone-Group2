<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ShopDetailsQuantity extends Component
{

    public $count = 1;
    public $product_id;

    public function increment(){
        $this->count++;
    }
    public function decrement(){
        if($this->count > 1){
            $this->count--;
        }
    }

    public function addToCart()
    {
        $product = Product::find($this->product_id);

        $cart = session('cart');

        if (isset($cart[$this->product_id])) {
            $cart[$this->product_id]['quantity'] = (int)$cart[$this->product_id]['quantity'] + $this->count;
            session(['cart' => $cart]);
        } else {
            $cart[$this->product_id] = [
                "name" => $product->product_name,
                "quantity" => $this->count,
                "price" => $product->product_price,
                "photo" => $product->product_thumbnail
            ];
            session()->put('cart', $cart);
        }
        $this->count = 1;
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
        return view('livewire.shop-details-quantity');
    }
}
