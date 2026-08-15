<?php

namespace App\Livewire;

use App\Models\Reconciliation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Dashboard extends Component
{
    public function render(): View
    {
        $userId = Auth::id();

        $totalReconciled = Cache::remember('total_' . $userId, 600, function () use ($userId){
            return Reconciliation::whereHas('sale', fn ($q) => $q->where('user_id', $userId)
                ->whereMonth('sale_date', now()->month)
                ->whereYear('sale_date', now()->year)
            )
                ->count();
        });

        $reconciliationsReconciled = Cache::remember('total_conciliado_' . $userId, 600, function () use ($userId){
            return Reconciliation::whereHas('sale', fn ($q) => $q->where('user_id', $userId)
                ->whereMonth('sale_date', now()->month)
                ->whereYear('sale_date', now()->year)
            )
                ->where('status', 'conciliado')
                ->count();
        });

        $reconciliationDivergent = Cache::remember('total_divergente_' . $userId, 600, function () use ($userId){
            return Reconciliation::whereHas('sale', fn ($q) => $q->where('user_id', $userId)
                ->whereMonth('sale_date', now()->month)
                ->whereYear('sale_date', now()->year)
            )
                ->where('status', 'divergente')
                ->count();
        });

        $reconciliationPending = Cache::remember('total_pending_' . $userId, 600, function () use ($userId){
            return Reconciliation::whereHas('sale', fn ($q) => $q->where('user_id', $userId)
                ->whereMonth('sale_date', now()->month)
                ->whereYear('sale_date', now()->year)
            )
                ->where('status', 'pendente')
                ->count();
        });

        $percentageReconciliations = $totalReconciled > 0
        ? ($reconciliationsReconciled / $totalReconciled) * 100
        : 0;

        $dataReconciliations = [
            'total' => $totalReconciled,
            'reconciled' => $reconciliationsReconciled,
            'percentage' => $percentageReconciliations,
            'divergent' => $reconciliationDivergent,
            'pending' => $reconciliationPending,
        ];

        return view('livewire.dashboard', compact('dataReconciliations'));

    }
}
