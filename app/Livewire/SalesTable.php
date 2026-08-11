<?php

namespace App\Livewire;

use App\Models\Sale;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class SalesTable extends Component
{
    public function render(): View
    {
        $sales = Sale::where('user_id', auth()->id())->get();
        return view('livewire.sales-table', compact('sales'));
    }



}
