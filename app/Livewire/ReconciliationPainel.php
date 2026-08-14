<?php

namespace App\Livewire;

use App\Models\Reconciliation;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ReconciliationPainel extends Component
{
    public string $filter = '';

    public function render(): View
    {
        return view('livewire.reconciliation-panel');
    }

    /**
    * Metodo para alterar os filtros
    * @param string $f;
    * @return void
    */
    public function changeFilter(string $f): void
    {
        $this->filter = $f;
    }

    /**
    * Caso filtro todos escolido
    * @return void
    */
    public function allFilters()
    {
        return $reconciliations = Reconciliation::with('sale')
            ->whereHas('sale', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();
    }

    /**
    * Caso filtro Conciliado escolido
    * @return void
    */
    public function reconciledFilter(): void
    {

    }

    /**
    * Caso filtro Divergente escolido
    * @return void
    */
    public function divergentFilter(): void
    {

    }

    /**
    * Caso filtro Pendente escolido
    * @return void
    */
    public function pendantFilter(): void
    {

    }

}
