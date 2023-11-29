<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;

class RestaurantFilterService
{
    public static function restaurantFilter($validated)
    {
        $restaurants = Restaurant::all();
        if (isset($validated['is_open'])) {
            $restaurants = Restaurant::query()->where('is_open', $validated['is_open'])->get();
        }
        if (isset($validated['type'])) {
            $restaurantsType = RestaurantCategory::query()->where('name', $validated['type'])->first()->restaurants;
            $restaurants = $restaurants->intersect($restaurantsType);
        }
        if (isset($validated['score_gt'])) {
            $restaurantsScore = Restaurant::query()->where('score', '>', $validated['score_gt'])->get();
            $restaurants = $restaurants->intersect($restaurantsScore);
        }

        return $restaurants;
    }
}
