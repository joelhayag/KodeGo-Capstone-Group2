<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couriers extends Model
{
    use HasFactory;
    protected $table = "couriers";

    protected $fillable = [
        'courier_company',
        'courier_shipping_fee'
    ];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

}
