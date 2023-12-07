<?php

namespace App\Http\Resources\food;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartFoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                "name" => $this->name,
                "price" => $this->price,
                "food_party" => [
                    "count" => $this->foodParty?->count,
                    "percent" => $this->foodParty?->percent
                ],
        ];
    }
}
