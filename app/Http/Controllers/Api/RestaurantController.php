<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\restaurant\RestaurantRequest;
use App\Http\Resources\restaurant\RestaurantResource;
use App\Http\Resources\RestaurantCollection;
use App\Http\Resources\hehe;
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
            return RestaurantResource::collection($restaurants);
        else
            return RestaurantResource::collection(Restaurant::all());
    }

    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }
}
