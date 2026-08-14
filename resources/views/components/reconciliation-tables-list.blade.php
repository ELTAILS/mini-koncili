@props(['reconciliations'])

@foreach($reconciliations as $reconciliation)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{ $reconciliation->sale->order_code }}</td>
        <td class="td-value-transfer">R${{number_format($reconciliation->expected_amount, 2, ',', '.')}}</td>
        <td class="td-value-transfer">R${{number_format($reconciliation->received_amount, 2, ',', '.')}}</td>
        <td class="td-value-commission">R${{number_format($reconciliation->difference, 2, ',', '.')}}</td>
        <td class="{{ $reconciliation->status === 'conciliado' ? 'td-value-gross' : ($reconciliation->status === 'divergente' ? 'td-value-commission' : 'td-value-fee') }}">
            {{$reconciliation->status}}
        </td>
    </tr>
@endforeach
