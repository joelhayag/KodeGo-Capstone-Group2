<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {
        $total = 0;
        $count = 0;

        foreach ((array) session('cart') as $id => $details) {
            $total += $details['price'] * $details['quantity'];
            $count++;
        }
        return view('livewire.cart-counter')->with('total', $total)->with('count', $count);
    }
}
