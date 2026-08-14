@section('title', 'Painel de reconciliação')

<div class="p-4">
    <h1 class="text-xl font-bold text-center mb-4 mt-4">Painel de Reconciliações</h1>

    <p class="text-center text-gray-600 mb-4">Aqui fica suas reconciliações das suas vendas e transferências</p>

    <div class="mb-4 flex justify-center items-center gap-1.5 p-4">
        <button class="btn-reconciliation bg-blue-500">Todos</button>
        <button class="btn-reconciliation bg-green-500">Conciliado</button>
        <button class="btn-reconciliation bg-yellow-500">Divergente</button>
        <button class="btn-reconciliation bg-red-500">Pendente</button>
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
                <tr>
                    <td colspan="6" class="text-center">Escolha uma das opções acima.</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
