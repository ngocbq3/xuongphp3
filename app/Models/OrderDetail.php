<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'product_variant_id',
        'order_id',
        'price',
        'quantity',
    ];
}
