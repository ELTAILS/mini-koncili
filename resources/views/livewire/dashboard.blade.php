<div>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 text-center">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight mb-3">Bem vindo {{ auth()->user()->name }} ao Dashboard</h1>
        <p>Atualizado em: {{ now()->format('d/m/Y') }}</p>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{--A navegação de links do dashboard ficará aqui--}}
                {{--Copia essa div e coloca as informações do link--}}
                <div class="p-6 text-gray-900 border-b border-black">
                    <x-nav-link :href="route('sales')" :active="request()->routeIs('sales')">
                        {{__('Suas vendas')}}
                    </x-nav-link>
                </div>
                <div class="p-6 text-gray-900 border-b border-black">
                    <x-nav-link :href="route('transfers')" :active="request()->routeIs('transfers')">
                        {{__('Suas transferências')}}
                    </x-nav-link>
                </div>
                <div class="p-6 text-gray-900">
                    <x-nav-link :href="route('reconciliation')" :active="request()->routeIs('reconciliation')">
                        {{__('Painel de reconciliação')}}
                    </x-nav-link>
                </div>
            </div>
        </div>

        @if ($dataReconciliations['total'] > 0)
            <div class="mt-12 mx-auto flex w-full max-w-6xl flex-col items-stretch gap-6 px-4 min-[822px]:flex-row min-[822px]:items-start">
            {{--Card--}}
            <div class="w-full min-[822px]:w-1/2">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="mb-5">
                        <p class="text-sm font-medium text-gray-500">
                            Resumo das vendas
                        </p>

                        <h2 class="mt-1 text-3xl font-bold text-gray-900">
                            {{ $dataReconciliations['total'] }}
                        </h2>

                        <p class="text-sm text-gray-500">
                            Total de vendas
                        </p>
                    </div>

                    <div class="mb-5 flex items-center justify-between rounded-xl bg-gray-50 p-4">
                        <div>
                            <p class="text-sm text-gray-500">
                                Taxa de conciliação
                            </p>

                            <p class="text-2xl font-semibold text-green-600">
                                {{ number_format($dataReconciliations['percentage'], 2) }}%
                            </p>
                        </div>

                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100">
                            <span class="text-lg">✓</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <p class="text-xs font-medium text-gray-500">
                            Última atualização
                        </p>

                        <p class="mt-1 text-sm text-gray-700">
                            {{ now()->format('d/m/Y') }}
                        </p>

                        <p class="mt-3 text-xs leading-relaxed text-gray-400">
                            O gráfico de pizza mostra a distribuição das vendas
                            conciliadas, divergentes e pendentes.
                        </p>
                    </div>
                </div>
            </div>
            {{--Grafico--}}
            <div class="w-full min-[822px]:w-1/2">
                <div class="mx-auto w-full max-w-md min-[822px]:max-w-none">
                    <canvas id="dataReconciliations" class="w-full"></canvas>
                </div>
            </div>
        </div>
        @else
            <h1 class="text-center text-xl mt-12 text-gray-900 tracking-tight mb-3">
                Nenhum dado registrado para exibir no momento. Por favor, verifique suas vendas e transferências para que possamos gerar o resumo de conciliação.
            </h1>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const data = @json($dataReconciliations);

    new Chart(document.getElementById('dataReconciliations'), {
        type: 'pie',
        data: {
            labels: ['Conciliadas', 'Divergentes', 'Pendentes'],
            datasets: [{
                data: [
                    data.reconciled,
                    data.divergent,
                    data.pending
                ]
            }]
        }
    });

</script>
