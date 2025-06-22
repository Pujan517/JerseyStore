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
        'tags',
        'image',
        'featured',
        'sizes',
    ];
public function category()
    {
        return $this->belongsTo(\App\Models\Catagory::class, 'catagory', 'catagory_name');
    }
    public function scopeSearch($query, $term)
    {
        $term = trim($term);
        $query->selectRaw('products.*, (
            (CASE WHEN title LIKE ? THEN 10 ELSE 0 END) +
            (CASE WHEN description LIKE ? THEN 5 ELSE 0 END) +
            (CASE WHEN catagory LIKE ? THEN 3 ELSE 0 END) +
            (CASE WHEN tags LIKE ? THEN 2 ELSE 0 END)
        ) as relevance', ["%$term%", "%$term%", "%$term%", "%$term%"])
        ->where(function($q) use ($term) {
            $q->where('title', 'LIKE', "%$term%")
              ->orWhere('description', 'LIKE', "%$term%")
              ->orWhere('catagory', 'LIKE', "%$term%")
              ->orWhere('tags', 'LIKE', "%$term%")
              ;
        })
        ->orderByDesc('relevance');
    }
    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }
}
