<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_code',
        'amount',
        'transfer_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
