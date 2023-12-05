<?php

namespace App\Http\Resources\restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeRestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->day => [
                'start' => $this->start_time,
                'end' => $this->end_time
            ]
        ];
    }
}
