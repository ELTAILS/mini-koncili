<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini Koncili</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 font-sans text-slate-800 antialiased">
        <div  class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(24,87,164,0.08),_transparent_45%)]">
            <header class="mx-auto max-w-6xl px-5 pt-6 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between rounded-full border border-slate-200 bg-white/90 px-4 py-3 shadow-sm backdrop-blur-sm sm:px-6">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('img/logo_sem_fundo.png') }}" alt="Mini Koncili" class="h-12 w-12 rounded-xl object-contain" />
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-brand-primary">Mini Koncili</p>
                            <p class="text-sm text-slate-500">Conciliação financeira</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-6xl px-5 pb-18 pt-10 sm:px-6 lg:px-8">
                <section class="grid items-center gap-10 lg:grid-cols-[1.15fr_0.85fr]">
                    <div>
                        <span class="inline-flex items-center rounded-full border border-brand-light bg-brand-light px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-brand-primary">
                            Projeto • Laravel + Livewire
                        </span>

                        <h1 class="mt-6 max-w-xl text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                            Acompanhe vendas, repasses e conciliações em um só lugar.
                        </h1>

                        <p class="mt-5 max-w-xl text-lg leading-8 text-slate-600">
                            O Mini Koncili foi pensado para reduzir as frustaçãoes de reconciliação financeira em um só lugar: comparar o esperado com o recebido em segundos, identificar divergências e manter tudo organizado para o time.
                        </p>

                        <div class="mt-8 flex flex-wrap items-center gap-4">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-brand-primary px-6 py-3 text-base font-semibold text-white shadow-lg shadow-brand-primary/20 transition hover:bg-brand-dark">
                                    Acessar dashboard
                                </a>
                            @endif

                            <a href="#sobre" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-6 py-3 text-base font-semibold text-slate-700 transition hover:border-brand-primary hover:text-brand-primary">
                                Ver funcionalidades
                            </a>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="rounded-[2rem] border border-slate-200 bg-white p-4 shadow-[0_25px_70px_rgba(15,23,42,0.08)]">
                            <img src="{{ asset('img/logo.png') }}" alt="Produto Mini Koncili" class="h-[420px] w-full rounded-[1.5rem] border border-slate-100 bg-slate-50 object-contain p-6" />
                        </div>

                        <div class="absolute -bottom-5 -left-5 rounded-2xl border border-emerald-100 bg-white p-4 shadow-lg shadow-emerald-100/60">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Status</p>
                            <p class="mt-2 text-2xl font-bold text-slate-900">98,4%</p>
                            <p class="text-sm text-emerald-600">Conciliação precisa</p>
                        </div>
                    </div>
                </section>

                <section id="sobre" class="mt-20">
                    <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-primary">Sobre o projeto</p>
                            <h2 class="mt-2 text-3xl font-bold text-slate-900">O que o Mini Koncili resolve</h2>
                        </div>
                        <p class="max-w-2xl text-slate-600">
                            A plataforma foi criada para deixar a comparação entre vendas e repasses mais objetiva, com regras claras e painel visual para acompanhamento rápido.
                        </p>
                    </div>

                    <div x-data="{ tab: 'projeto' }" class="space-y-6">
                        <div class="flex flex-wrap gap-3">
                            <x-cardHome.btnCardHome nameBtn="Sobre o projeto" tab="projeto" />
                            <x-cardHome.btnCardHome nameBtn="Sobre mim" tab="mim" />
                            <x-cardHome.btnCardHome nameBtn="Stack" tab="stack" />
                            <x-cardHome.btnCardHome nameBtn="Como usei IA" tab="ia" />
                        </div>

                        {{--Importar conteúdo cards--}}
                        @php
                            $cards = require resource_path('views/components/cardHome/dadosCard.php');
                        @endphp

                        <div class="rounded-[2rem] border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                            <x-cardHome.card tab="projeto" :conteudoCard="$projetoCards" />
                            <x-cardHome.card tab="mim" :conteudoCard="$mimCards" />
                            <x-cardHome.card tab="stack" :conteudoCard="$stackCards" />
                            <x-cardHome.card tab="ia" :conteudoCard="$iaCards" />
                        </div>
                    </div>
                </section>
            </main>
            {{--Alerta projeto ficticio--}}
            <div class="mx-auto max-w-6xl px-5 pb-18 pt-10 sm:px-6 lg:px-8">
                <div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm sm:p-6">
                    <p class="text-sm text-slate-600">
                        <strong class="font-semibold text-slate-900">Atenção:</strong> Este é um projeto fictício, desenvolvido para fins de estudo e demonstração de habilidades técnicas. Não possui integração com sistemas financeiros reais e não deve ser utilizado para transações financeiras.
                    </p>
                </div>
            </div>
            {{--Footer--}}
            <div class="w-full mt-12">
                <x-footer-guest />
            </div>
        </div>
    </body>
</html>
