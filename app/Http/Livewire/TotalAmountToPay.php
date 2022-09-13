<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PromoSale;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

class TotalAmountToPay extends Component
{
    public $coupon_code;
    public $message;
    public $isFound = false;
    public $coupon;
    public function applyForCoupon(){
        $this->coupon = Coupon::all()->where('coupon_code', '=', $this->coupon_code)->sortByDesc('id')->first();

        if ($this->coupon) {
            $end_date = Carbon::parse($this->coupon->coupon_start_date);

            $current = Carbon::now();
            $length = $current->diffInDays($end_date, false);

            if ($length < 1) {
                $end_date = Carbon::parse($this->coupon->coupon_end_date);
                $length = $current->diffInDays($end_date, false);

                if ($length < 0) {
                    $this->coupon = null;
                }
            } else {
                $this->coupon = null;
            }
        }
        if($this->coupon){
            $this->message = "Redeem Successfully";
            $this->isFound = true;
        }else{
            $this->message = "Invalid Code";
            $this->isFound = false;
        }
    }

    public function render()
    {
        $sale = PromoSale::all()->sortByDesc('id')->first();

        $total = 0;
        $subtotal = 0;
        $amount = [];
        $sale_discount = 0;

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
                } else {
                    $sale = null;
                }
            }

            if ($sale) {
                $total += ($details['price'] - ($details['price'] * ($sale->sale_percentage / 100))) * $details['quantity'];
            } else {
                $total += $details['price'] * $details['quantity'];
            }

            $subtotal += $details['price'] * $details['quantity'];
            $sale_discount += $details['price'] * $details['quantity'];
        }

        $sale_discount = $sale_discount - $total;
        $coupon_discount = $this->isFound ? $subtotal * ($this->coupon->coupon_percentage / 100) : 0;

        $total = ($total - $coupon_discount) > -1 ? ($total - $coupon_discount) : 0;

        $amount = [
            'subtotal' => $subtotal,
            'sale_discount' => $sale_discount,
            'coupon_discount' => $this->isFound ? $coupon_discount : 0,
            'total' => $total,
            'message' => $this->message
        ];

        return view('livewire.total-amount-to-pay')->with('amount', $amount);
    }
}
