<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;    protected $fillable = [
        'catagory_name',
        'image'
    ];
public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'catagory', 'catagory_name');
    }
}
