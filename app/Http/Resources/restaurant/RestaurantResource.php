<?php

namespace App\Http\Resources\restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->name,
            'type'=>$this->restaurantCategories->pluck('name'),
            'address'=>new RestaurantAddressResource($this->address),
            'is_open'=>$this->restaurantIsOpen(),
            'image'=>$this->image,
            'score'=>$this->score,
            'comment_count'=>count($this->orders()->has('comment')->get()->pluck('comment')->flatten()),
            'schedules'=>TimeRestaurantResource::collection($this->times)
        ];
    }
}
