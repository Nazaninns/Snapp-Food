<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

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
            $restaurantsScore = Restaurant::query()->where('score', '>=', $validated['score_gt'])->get();
            $restaurants = $restaurants->intersect($restaurantsScore);
        }

        return $restaurants;
    }

    public static function nearRestaurants(Collection $restaurants)
    {
        $currentAddress = Auth::user()->getCurrentAddress();
        return $restaurants->filter(function (Restaurant $restaurant) use ($currentAddress) {
            $x = false;
            $y = false;

            if ($restaurant->address?->latitude <= ($currentAddress?->latitude) + 3 && $restaurant->address?->latitude >= ($currentAddress?->latitude) - 3) {
                $x = true;
            }
            if ($restaurant->address?->longitude <= ($currentAddress?->longitude) + 3 && $restaurant->address?->longitude >= ($currentAddress?->longitude) - 3) {
                $y = true;
            }
            return $x && $y;
        });

    }
}
