<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AutocompleteController extends Controller
{
    public function products(Request $request)
    {
        $query = $request->get('query', '');
        $results = [];
        if ($query) {
            $results = Product::where('title', 'like', "%{$query}%")
                ->orderByDesc('popularity') // If you have a popularity column
                ->take(10)
                ->get(['id', 'title', 'image', 'price', 'popularity']);
        }
        return response()->json($results);
    }
}
