<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';
    protected $fillable = [
        'shop_name', 'email', 'mobile_no', 'turnover', 'shop_image', 'is_active', 'created_by'
    ];
}
