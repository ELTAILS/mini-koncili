<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ReconciliationPanel extends Component
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
    public function allFilters(): void
    {

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
