<?php

namespace App\Providers;

use App\Models\Reconciliation;
use App\Observers\ReconciliationObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra os serviços da aplicação.
     */
    public function register(): void
    {
        //
    }

    /**
     * Aplica o observador de reconciliação.
     */
    public function boot(): void
    {
        Reconciliation::observe(ReconciliationObserver::class);
    }
}
