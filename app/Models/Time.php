<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Time extends Model
{
    use HasFactory;
protected $fillable=[
    'day','start_time','end_time','restaurant_id'
];
    public function restaurant():BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
