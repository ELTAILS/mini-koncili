@section('title', 'Suas transferências')
<div class="p-4">
    <h1 class="text-3xl text-gray-900 tracking-tight font-bold text-center mb-4 mt-4">Suas transferências</h1>
    <p class="text-center text-gray-600 mb-4">Aqui estão todas as suas transferências.</p>
    <div class="mb-4">
        <input type="text" wire:model.live="search" placeholder="Buscar por pedido..."
            class="border rounded px-3 py-2">
        <button wire:click="create" class="bg-blue-700 text-white px-4 py-2 rounded">Nova Tranferencia</button>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-brand-light bg-white shadow-sm">
        <table class="table-dashboard">
            <thead>
                <tr class="bg-brand-dark/95 text-white">
                    <th>#</th>
                    <th>código do pedido</th>
                    <th>quantia</th>
                    <th>data de transferência</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @if ($transfers->count() > 0)
                    @foreach ($transfers as $transfer)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$transfer->order_code}}</td>
                            <td class="td-value-transfer">R${{number_format($transfer->amount, '2' , ',', '.')}}</td>
                            <td>{{$transfer->transfer_date->format('d/m/Y')}}</td>
                            <td>
                                <button wire:click="destroy({{ $transfer->id }})"
                                    wire:confirm="Tem certeza que deseja excluir transferencia?"
                                    class="text-red-600 hover:underline">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma transferência encontrada.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

        @if ($showModal)
        <div wire:transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Nova Tranferencia</h2>

                <form wire:submit="store">
                    <div class="mb-3">
                        <label>Código do pedido</label>
                        <input type="text" wire:model="order_code" class="border rounded w-full px-2 py-1">
                        @error('order_code') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Data de transferência</label>
                        <input type="date" wire:model="transfer_date" class="border rounded w-full px-2 py-1">
                        @error('transfer_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Quantia</label>
                        <input type="number" step="0.01" wire:model="amount" class="border rounded w-full px-2 py-1">
                        @error('amount') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
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
