<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{--A navegação de links do dashboard ficará aqui--}}
                {{--Copia essa div e coloca as informações do link--}}
                <div class="p-6 text-gray-900">
                    <x-nav-link :href="route('sales')" :active="request()->routeIs('sales')">
                        {{__('Suas vendas')}}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
