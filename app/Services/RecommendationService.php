<?php
namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Models\UserActivity;
use Illuminate\Support\Facades\DB;

class RecommendationService
{
    /**
     * Get recommended products for a user (hybrid: collaborative + content-based)
     */
    public function getRecommendations(?User $user, int $limit = 8)
    {
        if ($user) {
            // 1. Get product IDs from user's activity
            $viewed = $user->activities()->where('type', 'view')->pluck('product_id');
            $purchased = $user->activities()->where('type', 'purchase')->pluck('product_id');
            $interacted = $viewed->merge($purchased)->unique();

            // 2. Content-based: find similar products (category, tags, brand, price)
            $similarProducts = collect();
            foreach (Product::whereIn('id', $interacted)->get() as $prod) {
                $query = Product::query();
                $query->where('id', '!=', $prod->id);
                // Use 'catagory' (string) instead of 'catagory_id'
                $query->where('catagory', $prod->catagory);
                // Optionally add more filters: tags, brand, price range
                $similarProducts = $similarProducts->merge($query->limit(5)->get());
            }

            // 3. Collaborative: products other users interacted with
            $otherUserIds = UserActivity::whereIn('product_id', $interacted)
                ->where('user_id', '!=', $user->id)
                ->pluck('user_id')->unique();
            $collabProducts = UserActivity::whereIn('user_id', $otherUserIds)
                ->where('type', 'purchase')
                ->pluck('product_id');

            // 4. Merge, remove already interacted, and get top-N
            $all = $similarProducts->pluck('id')
                ->merge($collabProducts)
                ->diff($interacted)
                ->unique()
                ->take($limit);
            return Product::whereIn('id', $all)->get();
        } else {
            // Guest: fallback to trending products (most purchased)
            $trending = UserActivity::where('type', 'purchase')
                ->select('product_id', DB::raw('count(*) as cnt'))
                ->groupBy('product_id')
                ->orderByDesc('cnt')
                ->limit($limit)
                ->pluck('product_id');
            return Product::whereIn('id', $trending)->get();
        }
    }
}
