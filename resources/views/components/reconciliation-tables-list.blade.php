@props(['reconciliations'])

@foreach($reconciliations as $reconciliation)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{ $reconciliation->sale->order_code }}</td>
        <td>{{$reconciliation->expected_amount}}</td>
        <td>{{$reconciliation->received_amount}}</td>
        <td>{{$reconciliation->difference}}</td>
        <td class="text-{{ $reconciliation->status === 'conciliado' ? 'green' : ($reconciliation->status === 'divergente' ? 'yellow' : 'red') }}-500">
            {{$reconciliation->status}}
        </td>
    </tr>
@endforeach
