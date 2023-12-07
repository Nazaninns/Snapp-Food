<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\address\StoreAddressRequest;
use App\Http\Requests\api\address\UpdateAddressRequest;
use App\Http\Resources\address\AddressResource;
use App\Models\Address;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->addresses->isEmpty()) return \response()->json(['data' => ['msg' => 'not found']], 404);
        return response()->json(
            ['data' =>
                AddressResource::collection(Auth::user()->addresses)
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $validated = $request->validated();
        Auth::user()->addresses()->create($validated);
        return response()->json(['data' => [
            'msg' => "address added successfully"
        ]], 201);
    }

    public function current(Address $address)
    {
        $this->authorize('update', $address);
        Auth::user()->addresses()->update([
            'current_address' => 0
        ]);
        $address->current_address = 1;
        $address->save();
        return response()->json(['data' => [
            'msg' => 'current address updated successfully'
        ]]);
    }
}
