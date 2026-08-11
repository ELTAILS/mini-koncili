<?php

namespace App\Livewire;

use App\Models\Sale;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.app')]
class SalesTable extends Component
{
    //outras propriedades e métodos do componente
    public string $search = '';
    public bool $showModal = false;
    public ?int $editingId = null;

    #[Validate('required|string|max:100')]
    public string $order_code = '';
    #[Validate('required|date')]
    public string $sale_date = '';
    #[Validate('required|numeric|min:0')]
    public float $gross_amount = 0;
    #[Validate('required|numeric|min:0')]
    public float $commission_amount = 0;
    #[Validate('required|numeric|min:0')]
    public float $fee_amount = 0;

    /*Renderizar a view*/
    public function render()
    {
        $sales = Sale::where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('order_code', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.sales-table', ['sales' => $sales]);
    }

    public function create(): void
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store(): void
    {
        $this->authorize('create', Sale::class);

        $this->validate();

        Sale::create([
            'user_id' => auth()->id(),
            'order_code' => $this->order_code,
            'sale_date' => $this->sale_date,
            'gross_amount' => $this->gross_amount,
            'commission_amount' => $this->commission_amount,
            'fee_amount' => $this->fee_amount,
        ]);

        $this->resetFields();
        $this->showModal = false;
    }

    public function destroy(int $saleId)
    {
        $sale = Sale::findOrFail($saleId);

        $this->authorize('delete', $sale);

        $sale->delete();
    }

    private function resetFields()
    {
        $this->order_code = '';
        $this->sale_date = '';
        $this->gross_amount = 0;
        $this->commission_amount = 0;
        $this->fee_amount = 0;
    }

}
