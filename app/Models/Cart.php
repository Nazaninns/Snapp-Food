<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id', 'user_id','discount_id','address_id'
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function food(): BelongsToMany
    {
        return $this->belongsToMany(Food::class, 'food_carts')->withPivot('count');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function totalPrice()
    {
        return $this->food->sum(function (Food $food) {
            return $food->price * $food->pivot->count;
        });
    }

    public function totalPriceAfterDiscount()
    {
        $totalPrice = $this->food->sum(function (Food $food) {
            return $food->finalPrice() * $food->pivot->count;
        });
        $calculateDiscountPrice = (100 - $this->discount?->percent) / 100;
        return $calculateDiscountPrice * $totalPrice;
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    public function totalDiscount()
    {
        return $this->totalPrice() - $this->totalPriceAfterDiscount();
    }
}
