<?php

namespace App\Services;

class BubbleSort
{
    /**
     * Sort an array of products by price (ascending).
     *
     * @param array $arr
     * @return array
     */
    public static function sort(array $arr): array
    {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // Use discount_price if set, else price
                $priceA = isset($arr[$j]['discount_price']) && $arr[$j]['discount_price'] ? $arr[$j]['discount_price'] : $arr[$j]['price'];
                $priceB = isset($arr[$j+1]['discount_price']) && $arr[$j+1]['discount_price'] ? $arr[$j+1]['discount_price'] : $arr[$j+1]['price'];
                if ($priceA > $priceB) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
        return $arr;
    }
}
