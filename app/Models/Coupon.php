<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = "coupons";

    protected $fillable = [
        'coupon_percentage',
        'coupon_code',
        'coupon_start_date',
        'coupon_end_date'
    ];
}
