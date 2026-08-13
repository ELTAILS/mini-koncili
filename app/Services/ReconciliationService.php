<?php

namespace App\Services;

use App\Models\Reconciliation;
use App\Models\Sale;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;

class ReconciliationService
{
    /**
     * Reconciliar os dados fornecidos.
     * @param $sale
     * @param $reconciliation
     * @return Reconciliation
     */
    public function reconcile(Sale $sale, Reconciliation $reconciliation): Reconciliation
    {
        $transfer = Transfer::where('user_id', Auth::id())
            ->where('order_code', $sale->order_code)
            ->first();

        $expected_value = $sale->gross_amount - $sale->commission_amount - $sale->fee_amount;

        $reconciliation->sale_id = $sale->id;
        $reconciliation->expected_amount = $expected_value;

        if (!$transfer) {
            $reconciliation->status = 'pendente';
            $reconciliation->received_amount = 0;
            $reconciliation->difference = $expected_value;
            $reconciliation->save();
            return $reconciliation;
        }

        $reconciliation->transfer_id = $transfer->id;
        $reconciliation->received_amount = $transfer->amount;

        $difference = abs($expected_value - $transfer->amount);

        if ($difference < 0.01) {
            $reconciliation->status = 'conciliado';
            $reconciliation->difference = 0;
        } else {
            $reconciliation->status = 'divergente';
            $reconciliation->difference = $expected_value - $transfer->amount;
        }

        $reconciliation->save();

        return $reconciliation;
    }
}
