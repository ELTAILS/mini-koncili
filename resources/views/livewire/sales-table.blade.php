@section('title', 'Suas vendas')
<div class="p-4">
    <div class="mb-4">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded bg-gray-800 px-4 py-2 text-white hover:bg-gray-700">
            Voltar
        </a>
    </div>
    <h1 class="text-3xl text-gray-900 tracking-tight font-bold text-center mb-4 mt-4">Suas vendas</h1>
    <p class="text-center text-gray-600 mb-4">Aqui estão todas as suas vendas.</p>
    <div class="mb-4">
        <input type="text" wire:model.live="search" placeholder="Buscar por pedido..."
            class="border rounded px-3 py-2">
        <button wire:click="create" class="bg-blue-700 text-white px-4 py-2 rounded">Nova venda</button>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-brand-light bg-white shadow-sm">
        <table class="table-dashboard">
            <thead>
                <tr class="bg-brand-dark/95 text-white">
                    <th>#</th>
                    <th>Pedido</th>
                    <th>valor bruto</th>
                    <th>valor comissão</th>
                    <th>valor taxa</th>
                    <th>Data da venda</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @if ($sales->count() > 0)
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->order_code }}</td>
                            <td class="td-value-gross">R${{ number_format($sale->gross_amount, 2, ',', '.') }}</td>
                            <td class="td-value-commission">R${{ number_format($sale->commission_amount, 2, ',', '.') }}</td>
                            <td class="td-value-fee">R${{ number_format($sale->fee_amount, 2, ',', '.') }}</td>
                            <td>{{ $sale->sale_date->format('d/m/Y') }}</td>
                            <td>
                                <button wire:click="destroy({{ $sale->id }})"
                                    wire:confirm="Tem certeza que deseja excluir esta venda?"
                                    class="text-red-600 hover:underline">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma venda encontrada.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if ($showModal)
        <div wire:transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Nova venda</h2>

                <form wire:submit="store">
                    <div class="mb-3">
                        <label>Código do pedido</label>
                        <input type="text" wire:model="order_code" class="border rounded w-full px-2 py-1">
                        @error('order_code') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Data da venda</label>
                        <input type="date" wire:model="sale_date" class="border rounded w-full px-2 py-1">
                        @error('sale_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Valor bruto</label>
                        <input type="number" step="0.01" wire:model="gross_amount" class="border rounded w-full px-2 py-1">
                        @error('gross_amount') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Comissão</label>
                        <input type="number" step="0.01" wire:model="commission_amount" class="border rounded w-full px-2 py-1">
                        @error('commission_amount') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Taxa</label>
                        <input type="number" step="0.01" wire:model="fee_amount" class="border rounded w-full px-2 py-1">
                        @error('fee_amount') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="$set('showModal', false)" class="px-4 py-2 border rounded">
                            Cancelar
                        </button>
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
