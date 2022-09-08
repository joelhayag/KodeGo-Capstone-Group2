<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";

    protected $fillable = [
        'department_name',
        'department_img_url',
        'department_status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
