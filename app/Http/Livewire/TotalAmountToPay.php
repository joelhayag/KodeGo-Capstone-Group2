<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TotalAmountToPay extends Component
{
    public function render()
    {
       $total = 0;
       $amount = [];

        foreach ((array) session('cart') as $id => $details){
            $total += $details['price'] * $details['quantity'];
        }
        $amount=[
            'subtotal' => $total
        ];

        return view('livewire.total-amount-to-pay')->with('amount', $amount);
    }
}
