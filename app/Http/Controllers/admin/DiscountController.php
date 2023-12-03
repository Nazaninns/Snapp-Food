<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DiscountRequest;
use App\Models\Discount;
use App\Models\User;
use App\Notifications\DiscountCodeNotification;
use Illuminate\Support\Facades\Notification;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts=Discount::paginate(6);
        return view('admin.discounts.index',compact('discounts'));
    }

    public function create()
    {
       return view('admin.discounts.create');
    }

    public function store(DiscountRequest $discountRequest)
    {
        $validated=$discountRequest->validated();
        $validated['code']=uniqid();
        $discount=Discount::query()->create($validated);
        Notification::send(User::all()->where(function ($user){
           return $user->hasRole('customer');
        }), new DiscountCodeNotification($discount));
        return redirect()->route('admin.discounts.index');
    }

    public function delete(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('admin.discounts.index');
    }
}
