<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;
    protected $fillable=[
        'percent','code'
    ];

    public function carts():HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
