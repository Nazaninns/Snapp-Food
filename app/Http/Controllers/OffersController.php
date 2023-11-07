<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferCodeRequest;
use App\Models\DiscountCode;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $offers=DiscountCode::paginate(6);
        return view('admin.offer.index',compact('offers'));
    }

    public function create()
    {
       return view('admin.offer.create');
    }

    public function store(OfferCodeRequest $offerCodeRequest)
    {
        $validated=$offerCodeRequest->validated();
        $validated['code']=uniqid();
        DiscountCode::query()->create($validated);
        return redirect()->route('admin.offer.index');
    }

    public function delete(DiscountCode $offer)
    {
        $offer->delete();
        return redirect()->route('admin.offer.index');
    }
}
