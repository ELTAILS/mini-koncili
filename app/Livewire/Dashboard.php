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

        $totalConciliado = Cache::remember('total_conciliado_' . $userId, 6000, function () use ($userId){
            return Reconciliation::whereHas('sale', fn ($q) => $q->where('user_id', $userId))
                ->where('status', 'conciliado')
                ->count();
        });

        return view('livewire.dashboard', compact('totalConciliado'));

    }
}
