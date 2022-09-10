<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\Department;
use App\Models\Category;
use App\Models\AppUser;
use App\Models\Review;

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
    public function banner_department($banner_id){
        $department = Department::find($banner_id);
        return $department;
    }
    public function category($category_id){
        $category = Category::find($category_id);
        return $category;
    }
    public function department($department_id){
        $department = Department::find($department_id);
        return $department;
    }
    public function vendor_specific($vendor_id){
        $vendor = AppUser::find($vendor_id);
        return $vendor;
    }

    public function related_products($category_id){
        $products = Product::all()->where('product_category_id', '=', $category_id)->take(4);
        return  $products;
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
