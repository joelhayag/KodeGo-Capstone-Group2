<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\PromoSale;
use App\Models\AppUser;
use App\Models\Product;

class OrderHistory extends Component
{
    public function render()
    {

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
        $id = session('longIn_user');

        $customer = AppUser::all()->where('id', '=', $id)->first();
        $orders = $customer->orderHistory($id);
        $orderHistory = [];
        foreach ($orders as $order) {
            $product = Product::all()->where('id', '=', $order->order_product_id)->first();
            $orderHistory[] = [
                "name" => $product->product_name,
                "quantity" => $order->order_quantity,
                "price" => $product->product_price,
                "photo" => $product->product_thumbnail,
                "status" => $order->order_order_status,
            ];
        }
        //dd($orders);

        return view('livewire.order-history')
            ->with('products', $orderHistory)
            ->with('sale', $sale);
    }
}
