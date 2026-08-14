@props(['reconciliations'])

@if($reconciliations->count() > 0)
    <tr>
        @foreach ($reconciliations as $r)
            <td>{{$loop->iteration}}</td>
            <td>{{$r->order_code}}</td>
            <td>{{$r->expected_amount}}</td>
            <td>{{$r->received_amount}}</td>
            <td>{{$r->difference}}</td>
            <td>{{$r->status}}</td>
        @endforeach
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">Nenhuma Reconciliação Divergente registrada</td>
    </tr>
@endif
