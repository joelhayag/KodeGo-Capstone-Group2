<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";

    protected $fillable = [
        'order_quantity',
        'order_product_id',
        'order_customer_id',
        'order_delivery_date',
        'order_order_status',
        'order_courier_id'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function customer()
    {
        return $this->hasOne(AppUser::class);
    }
    public function courier()
    {
        return $this->hasOne(Courier::class);
    }
}
