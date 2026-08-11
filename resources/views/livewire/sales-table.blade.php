<div class="p-4">
    <h1 class="text-xl font-bold text-center mb-4 mt-4">Suas vendas</h1>
    <p class="text-center text-gray-600 mb-4">Aqui estão todas as suas vendas.</p>
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
                </tr>
            </thead>
            <tbody>
                @if ($sales->count() > 0)
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->order_code }}</td>
                            <td>R${{ number_format($sale->gross_amount, 2, ',', '.') }}</td>
                            <td>R${{ number_format($sale->commission_amount, 2, ',', '.') }}</td>
                            <td>R${{ number_format($sale->fee_amount, 2, ',', '.') }}</td>
                            <td>{{ $sale->sale_date }}</td>
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
</div>
