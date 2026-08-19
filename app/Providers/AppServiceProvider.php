<?php

namespace App\Providers;

use App\Models\Reconciliation;
use App\Observers\ReconciliationObserver;
use Illuminate\Support\Facades\URL;
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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Reconciliation::observe(ReconciliationObserver::class);
    }
}
