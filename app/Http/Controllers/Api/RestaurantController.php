<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\restaurant\RestaurantRequest;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;

class RestaurantController extends Controller
{
    public function index(RestaurantRequest $request)
    {
        //filtering
        $validated = $request->validated();
        if (isset($validated['is_open'])) {
            $restaurants = Restaurant::query()->where('is_open', $validated['is_open'])->get();
        }
        if (isset($validated['type'])) {
            $restaurants = RestaurantCategory::query()->where('name', $validated['type'])->first()->restaurants;
        }
        if (isset($validated['score_gt'])){
            $restaurants=Restaurant::query()->where('score','>',$validated['score_gt'])->get();
        }
        if (isset($restaurants))
            return $restaurants;
        else
            return Restaurant::all();
    }

    public function show(Restaurant $restaurant)
    {
        return $restaurant;
    }
}
