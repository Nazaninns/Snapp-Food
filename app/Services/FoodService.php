<?php

namespace App\Services;

use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class FoodService
{
    public static function filterFood($foodRequest)
    {
        $foods = Auth::user()->restaurant->food();
        if ($foodRequest->validated('sort') == 'asc') $foods = $foods->orderBy('name');
        if ($foodRequest->validated('sort') == 'desc') $foods = $foods->orderByDesc('name');
        if ($foodRequest->validated('filter') !== null)
            $foods = Food::query()->where([
                'food_category_id' => $foodRequest->validated('filter'),
                'restaurant_id' => Auth::user()->restaurant->id
            ]);
        return $foods;
    }
}
