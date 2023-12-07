<?php

namespace App\Models;

use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'day', 'start_time', 'end_time', 'restaurant_id'
    ];
    protected $casts = [
        'start_time' => TimeCast::class,
        'end_time' => TimeCast::class
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
