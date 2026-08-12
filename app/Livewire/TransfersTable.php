<?php

namespace App\Livewire;

use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class TransfersTable extends Component
{
    public string $search = '';
    public bool $showModal = false;

    #[Validate('required|max:100')]
    public string $order_code;

    #[Validate('required|numeric|min:0')]
    public float $amount;

    #[Validate('required|date')]
    public string $transfer_date;

    public function render(): View
    {
        $transfers = Transfer::where('user_id', Auth::id())
            ->when($this->search, function ($query){
                $query->where('order_code', 'like', '%' . $this->search . '%');
            })
            ->get();
        return view('livewire.transfers-table', compact('transfers'));
    }

    public function create(): void
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store(): void
    {
        $this->authorize('create', Transfer::class);

        $this->validate();

        Transfer::create([
            'user_id' => Auth::id(),
            'order_code' => $this->order_code,
            'amount' => $this->amount,
            'transfer_date' => $this->transfer_date
        ]);

        $this->resetFields();
        $this->showModal = false;

    }

    public function destroy(int $transferId): void
    {
        $transfer = Transfer::findOrFail($transferId);

        $this->authorize('delete', $transfer);

        $transfer->delete();
    }

    public function resetFields(): void
    {
        $this->order_code = '';
        $this->amount = 0;
        $this->transfer_date = '';
    }

}
