@section('title', 'Painel de reconciliação')

<div class="p-4">
    <h1 class="text-3xl text-gray-900 tracking-tight font-bold text-center mb-4 mt-4">Painel de Reconciliações</h1>

    <p class="text-center text-gray-600 mb-4">Aqui fica suas reconciliações das suas vendas e transferências</p>

    <div class="mb-4 flex justify-center items-center gap-1.5 p-4">
        <button class="btn-reconciliation bg-blue-500" wire:click="changeFilter('allFilters')">Todos</button>

        <button class="btn-reconciliation bg-green-500" wire:click="changeFilter('reconciledFilter')">Conciliado</button>

        <button class="btn-reconciliation bg-yellow-500" wire:click="changeFilter('divergentFilter')">Divergente</button>

        <button class="btn-reconciliation bg-red-500" wire:click="changeFilter('pendantFilter')">Pendente</button>
    </div>

    <div class="p-4">
        <button class="btn-reconciliation bg-slate-700 text-center" wire:click="consolidate">
            <span wire:loading.remove wire:target="consolidate">Consolidar</span>
            <span wire:loading wire:target="consolidate">Carregando...</span>
        </button>
        <small> <br>
            Aperte o botão abaixo para consolidar todas as reconciliações pendentes, caso tenha alguma.
        </small>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-brand-light bg-white shadow-sm">
        <table class="table-dashboard">
            <thead>
                <tr class="bg-brand-dark/95 text-white">
                    <th>#</th>
                    <th>Pedido</th>
                    <th>Valor esperado</th>
                    <th>Valor recebido</th>
                    <th>Diferença</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <x-reconciliation-tables-list :reconciliations="$this->getReconciliations()" />
            </tbody>
        </table>
    </div>
</div>
