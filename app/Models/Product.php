<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\Department;
use App\Models\Category;
use App\Models\AppUser;
use App\Models\Banner;

class Product extends Model
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
    public function vendor()
    {
        return $this->belongsTo(AppUser::class);
    }
    public function banner_department($id){
        $department = Department::find($id);
        return $department;
    }
    public function category($id){
        $category = Category::find($id);
        return $category;
    }
    public function vendor_specific($id){
        $vendor = AppUser::find($id);
        return $vendor;
    }
}
