<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'order_id', 'text', 'score', 'user_id','situation'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reply():HasOne
    {
        return $this->hasOne(Reply::class);

    }

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
