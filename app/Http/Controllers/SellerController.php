<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantSettingRequest;
use App\Http\Requests\ResturantProfileRequest;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function dashboard()
    {
        $user=Auth::user();
        return view('seller.dashboard',compact('user'));
    }

    public function restaurantProfile()
    {
        $categories=RestaurantCategory::all();
        return view('seller.profile',compact('categories'));
    }

    public function profileStore(ResturantProfileRequest $request)
    {
        Restaurant::query()->create($request->validated());
        return redirect()->route('seller.dashboard');
    }
    public function restaurantSetting()
    {
        return view('seller.setting');
    }

    public function updateSetting(RestaurantSettingRequest $request,Restaurant $restaurant)
    {
        $restaurant->update($request->validated());
        return redirect()->route('seller.dashboard');
    }
}
