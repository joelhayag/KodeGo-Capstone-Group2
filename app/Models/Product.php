<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'product_name',
        'product_thumbnail',
        'product_img_collection',
        'product_desc',
        'product_price',
        'product_weight',
        'product_quantity',
        'product_department_id',
        'product_category_id',
        'product_vendor_id'
    ];

    public function images()
    {
        return $this->hasMany(Images::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function vendor()
    {
        return $this->belongsTo(AppUser::class);
    }
    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}
