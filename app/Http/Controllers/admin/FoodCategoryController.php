<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\FoodCategoryRequest;
use App\Http\Requests\FoodCategoryCreateRequest;
use App\Http\Requests\PaginateRequest;
use App\Models\FoodCategory;
use App\Services\PaginateService;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaginateRequest $request)
    {
        $foodCategories=FoodCategory::query();
        $foodCategories=PaginateService::paginate($request->validated('paginate'),$foodCategories);
        return view('admin.food.index',compact('foodCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodCategoryRequest $request)
    {
        FoodCategory::query()->create($request->validated());
        return redirect()->route('admin.food_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodCategory $foodCategory)
    {
        return view('admin.food.show',compact('foodCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodCategory $foodCategory)
    {
        return view('admin.food.edit',compact('foodCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodCategoryRequest $request, FoodCategory $foodCategory)
    {
        $foodCategory->update($request->validated());
        return redirect()->route('admin.food_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodCategory $foodCategory)
    {
        $foodCategory->delete();
        return redirect()->route('admin.food_category.index');
    }
}
