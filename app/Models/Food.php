<?php

namespace App\Models;

use App\Casts\ImageCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'ingredients', 'price', 'image', 'food_category_id', 'restaurant_id'
    ];

    public function foodCategory(): BelongsTo
    {
        return $this->belongsTo(FoodCategory::class);
    }

    protected $casts = [
        'image' => ImageCast::class
    ];

    public function finalPrice()
    {
        $percent = (100 - $this->foodParty?->percent) / 100;
        return $this->price * $percent;
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foodParty(): HasOne
    {
        return $this->hasOne(FoodParty::class);
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'food_carts')->withPivot('count');
    }

}
