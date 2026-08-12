<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_code',
        'sale_date',
        'gross_amount',
        'commission_amount',
        'fee_amount',
    ];

    protected $casts = [
        'sale_date' => 'datetime',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

}
