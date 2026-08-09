<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Reconciliation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'transfer_id',
        'status',
        'expected_amount',
        'received_amount',
        'difference',
        'reconciliation_date',
    ];

    public function transfer(): belongsTo
    {
        return $this->belongsTo(Transfer::class);
    }

    public function sale(): belongsTo
    {
        return $this->belongsTo(Sale::class);
    }

}
