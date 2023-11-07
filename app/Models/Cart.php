<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'restaurant_id','user_id','pay'
    ];

    public function restaurant():BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function food():BelongsToMany
    {
        return $this->belongsToMany(Food::class,'food_carts');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
