<?php

namespace App\Http\Resources\cart;

use App\Http\Resources\RestaurantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public static $wrap='carts';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'restaurant'=>new RestaurantResource($this->restaurant),
            'food'=> CartFoodResource::collection($this->food)
        ];
    }
}
