<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";

    protected $fillable = [
        'review',
        'rating',
        'product_id',
        'customer_id'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function customer()
    {
        return $this->hasOne(AppUser::class);
    }
}
