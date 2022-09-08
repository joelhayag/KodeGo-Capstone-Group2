<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banners";

    protected $fillable = [
        'banner_desc',
        'banner_start_date',
        'banner_end_date',
        'product_id'
    ];
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
