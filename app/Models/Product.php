<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description', 
        'price',
        'discount_price',
        'quantity',
        'catagory',
        'image',
        'featured',
    ];
public function category()
    {
        return $this->belongsTo(\App\Models\Catagory::class, 'catagory', 'catagory_name');
    }
}
