<?php

namespace App\Observers;

use App\Models\Reconciliation;
use Illuminate\Support\Facades\Cache;

class ReconciliationObserver
{
    /**
     * Limpa o cache relacionado à reconciliação.
     */
    public function created(Reconciliation $reconciliation): void
    {
        $this->clearCache($reconciliation);
    }

    /**
     * Limpa o cache relacionado à reconciliação.
     */
    public function updated(Reconciliation $reconciliation): void
    {
        $this->clearCache($reconciliation);
    }

    /**
     * Limpa o cache relacionado à reconciliação.
     */
    public function deleted(Reconciliation $reconciliation): void
    {
        $this->clearCache($reconciliation);
    }

    /**
     * Limpa o cache relacionado à reconciliação.
     */
    private function clearCache(Reconciliation $reconciliation): void
    {
        $userId = $reconciliation->sale->user_id;

        Cache::forget('total_' . $userId);
        Cache::forget('total_conciliado_' . $userId);
        Cache::forget('total_divergente_' . $userId);
        Cache::forget('percentual_mes_' . $userId);
    }

}
