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

        //Caso a tranferencia não existir
        if(!$transfer) {
            $reconciliation->status = 'pendente';
            $reconciliation->save();
            return $reconciliation;
        }

        //Mostra o valor liquido
        $expected_value = $sale->gross_amount - $sale->commission_amount - $sale->fee_amount;

        $difference = abs($expected_value - $transfer->amount);

        if($difference < 0.01) {
            $reconciliation->status = 'conciliado';
        } else {
            $reconciliation->status = 'divergente';
            $reconciliation->difference = $expected_value - $transfer->amount;
        }

        $reconciliation->save();

        return $reconciliation;
    }
}
