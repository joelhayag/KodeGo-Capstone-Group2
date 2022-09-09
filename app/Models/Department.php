<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";

    protected $fillable = [
        'department_name',
        'department_status'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
