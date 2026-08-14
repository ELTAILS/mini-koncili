<?php

namespace App\Livewire;

use App\Models\Reconciliation;
use App\Models\Sale;
use App\Services\ReconciliationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ReconciliationPainel extends Component
{
    public string $filter = 'allFilters';

    public function render(): View
    {
        return view('livewire.reconciliation-painel');
    }

    public function changeFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Consolida as vendas do usuário logado e cria ou atualiza as reconciliações correspondentes.
     * @return void
    */
    public function consolidate(): void
    {
        $sales = Sale::where('user_id', Auth::id())->get();

        $service = new ReconciliationService();

        foreach ($sales as $sale) {
            $reconciliation = Reconciliation::firstOrNew(['sale_id' => $sale->id]);
            $service->reconcile($sale, $reconciliation);
        }
    }

    /**
     * Retorna as reconciliações do usuário logado, filtradas conforme o filtro atual.
     */
    public function getReconciliations()
    {
        return Reconciliation::with('sale')
            ->whereHas('sale', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->when($this->filter !== 'allFilters', function ($query) {
                $query->where('status', $this->statusFromFilter());
            })
            ->get();
    }

    /**
     * Retorna o status correspondente ao filtro atual.
     * @return string
     */
    private function statusFromFilter(): string
    {
        return match ($this->filter) {

            'reconciledFilter' => 'conciliado',
            'divergentFilter' => 'divergente',
            'pendantFilter' => 'pendente',
        };
    }

}
