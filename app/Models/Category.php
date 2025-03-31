<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    protected $fillable = [
        'name',
        'icon'
    ];

    //Quan hệ 1 - 1
    public function product()
    {
        return $this->hasOne(Product::class);
    }

    //Quan hệ 1 - n
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
