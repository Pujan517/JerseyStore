<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'product_title', 'price', 'quantity', 'image', 'Product_id', 'user_id', 'size'
    ];
}
