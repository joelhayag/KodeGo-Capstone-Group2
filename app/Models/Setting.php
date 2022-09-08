<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = "settings";

    protected $fillable = [
        'app_name',
        'app_email',
        'app_mobile',
        'app_open_time',
        'app_map_url',
        'app_address',
        'app_shipping_fee'
    ];
}
