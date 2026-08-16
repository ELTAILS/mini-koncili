<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_code' => $this->order_code,
            'gross_amount' => $this->gross_amount,
            'commission_amount' => $this->commission_amount,
            'fee_amount' => $this->fee_amount,
            'sale_date' => $this->sale_date,
        ];
    }
}
