<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodParty extends Model
{
    use HasFactory;

    protected $fillable = [
        'count', 'percent', 'food_id'
    ];

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
