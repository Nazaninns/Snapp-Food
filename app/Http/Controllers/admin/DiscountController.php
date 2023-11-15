<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DiscountRequest;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts=Discount::paginate(6);
        return view('admin.discount.index',compact('discounts'));
    }

    public function create()
    {
       return view('admin.discount.create');
    }

    public function store(DiscountRequest $discountRequest)
    {
        $validated=$discountRequest->validated();
        $validated['code']=uniqid();
        Discount::query()->create($validated);
        return redirect()->route('admin.discount.index');
    }

    public function delete(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('admin.discount.index');
    }
}
