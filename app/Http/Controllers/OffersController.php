<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferCodeRequest;
use App\Models\OfferCode;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $offers=OfferCode::all();
        return view('admin.offer.index');
    }

    public function create()
    {
       return view('admin.offer.create');
    }

    public function store(OfferCodeRequest $offerCodeRequest)
    {
        OfferCode::query()->create($offerCodeRequest->validated());
        return redirect()->route('admin.offer.index');
    }

    public function delete(OfferCode $offerCode)
    {
        $offerCode->delete();
        return redirect()->route('admin.offer.index');
    }
}
