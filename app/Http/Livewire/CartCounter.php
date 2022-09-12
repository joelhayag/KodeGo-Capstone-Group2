<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PromoSale;
use Illuminate\Support\Carbon;

class CartCounter extends Component
{
    public function render()
    {
        $sale = PromoSale::all()->sortByDesc('id')->first();

        $total = 0;
        $count = 0;

        foreach ((array) session('cart') as $id => $details) {

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
                }else{
                    $sale = null;
                }
            }

            if ($sale) {
                $total += ($details['price'] - ($details['price'] * ($sale->sale_percentage / 100))) * $details['quantity'];
            }else{
                $total += $details['price'] * $details['quantity'];
            }
            $count++;
        }
        return view('livewire.cart-counter')->with('total', $total)->with('count', $count);
    }
}
