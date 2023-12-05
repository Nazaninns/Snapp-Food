<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RestaurantCategoryRequest;
use App\Http\Requests\PaginateRequest;
use App\Models\RestaurantCategory;
use App\Services\PaginateService;

class RestaurantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaginateRequest $request)
    {
        $restaurantCategories=RestaurantCategory::query();
        $restaurantCategories=PaginateService::paginate($request->validated('paginate'),$restaurantCategories);
        return view('admin.restaurant.index',compact('restaurantCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantCategoryRequest $request)
    {
        RestaurantCategory::query()->create($request->validated());
        return redirect()->route('admin.restaurant_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RestaurantCategory $restaurantCategory)
    {
        return view('admin.restaurant.show',compact('restaurantCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RestaurantCategory $restaurantCategory)
    {
        return view('admin.restaurant.edit',compact('restaurantCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RestaurantCategoryRequest $request, RestaurantCategory $restaurantCategory)
    {
        $restaurantCategory->update($request->validated());
        return redirect()->route('admin.restaurant_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestaurantCategory $restaurantCategory)
    {
        $restaurantCategory->delete();
        return redirect()->route('admin.restaurant_category.index');
    }
}
