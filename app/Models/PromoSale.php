<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoSale extends Model
{
    use HasFactory;
    protected $table = "promo_sales";

    protected $fillable = [
        'sale_percentage',
        'sale_start_date',
        'sale_end_date'
    ];
}
