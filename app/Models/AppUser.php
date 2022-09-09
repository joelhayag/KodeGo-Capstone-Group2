<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;

    protected $table = "app_users";

    protected $fillable = [
        'first_name',
        'last_name',
        'mobile_number',
        'email_address',
        'password',
        'privilege',
        'other_notes',
        'address_country',
        'address_st',
        'address_others',
        'address_town',
        'address_state',
        'address_code'
    ];

    public function orders(){
        return $this->belongsTo(Order::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }
    public function reviews(){
        return $this->belongsTo(Review::class);
    }

}
