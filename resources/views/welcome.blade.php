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
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(24,87,164,0.08),_transparent_45%)]">
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
                            <a href="{{ route('login') }}" class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-brand-primary hover:text-brand-primary">
                                Entrar
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center rounded-full bg-brand-primary px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-dark">
                                Criar conta
                            </a>
                        @endif
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-6xl px-5 pb-18 pt-10 sm:px-6 lg:px-8">
                <section class="grid items-center gap-10 lg:grid-cols-[1.15fr_0.85fr]">
                    <div>
                        <span class="inline-flex items-center rounded-full border border-brand-light bg-brand-light px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-brand-primary">
                            Portfolio • Laravel + Livewire
                        </span>

                        <h1 class="mt-6 max-w-xl text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                            Acompanhe vendas, repasses e conciliações em um só lugar.
                        </h1>

                        <p class="mt-5 max-w-xl text-lg leading-8 text-slate-600">
                            O Mini Koncili foi pensado para reduzir a fricção da reconciliação financeira: comparar o esperado com o recebido em segundos, identificar divergências e manter tudo organizado para o time.
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
                            <button
                                type="button"
                                @click="tab = 'projeto'"
                                :class="tab === 'projeto' ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'bg-white text-slate-700 hover:border-brand-primary hover:text-brand-primary'"
                                class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold transition"
                            >
                                Sobre o projeto
                            </button>

                            <button
                                type="button"
                                @click="tab = 'mim'"
                                :class="tab === 'mim' ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'bg-white text-slate-700 hover:border-brand-primary hover:text-brand-primary'"
                                class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold transition"
                            >
                                Sobre mim
                            </button>

                            <button
                                type="button"
                                @click="tab = 'stack'"
                                :class="tab === 'stack' ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'bg-white text-slate-700 hover:border-brand-primary hover:text-brand-primary'"
                                class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold transition"
                            >
                                Stack
                            </button>

                            <button
                                type="button"
                                @click="tab = 'ia'"
                                :class="tab === 'ia' ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'bg-white text-slate-700 hover:border-brand-primary hover:text-brand-primary'"
                                class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold transition"
                            >
                                Como usei IA
                            </button>
                        </div>

                        <div class="rounded-[2rem] border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                            <div
                                x-show="tab === 'projeto'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-3"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="grid gap-4 md:grid-cols-2 xl:grid-cols-4"
                            >
                                @php
                                    $projetoCards = [
                                        ['title' => 'Conciliação por código', 'text' => 'O sistema cruza vendas e repasses pelo order_code, evitando erros de comparação por data ou valor.', 'accent' => 'bg-brand-light text-brand-primary'],
                                        ['title' => 'Status claro', 'text' => 'Cada item é classificado em conciliado, divergente ou pendente, com rastreio da diferença.', 'accent' => 'bg-emerald-50 text-emerald-700'],
                                        ['title' => 'Painel útil', 'text' => 'O dashboard centraliza métricas e permite ver rapidamente onde a operação precisa de atenção.', 'accent' => 'bg-amber-50 text-amber-700'],
                                        ['title' => 'Fluxo enxuto', 'text' => 'Tudo foi construído para ser simples, objetivo e fácil de explicar no contexto do portfólio.', 'accent' => 'bg-slate-100 text-slate-700'],
                                    ];
                                @endphp

                                @foreach ($projetoCards as $card)
                                    <article class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                                        <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl {{ $card['accent'] }} font-bold">
                                            {{ strtoupper(substr($card['title'], 0, 1)) }}
                                        </div>
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $card['title'] }}</h3>
                                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $card['text'] }}</p>
                                    </article>
                                @endforeach
                            </div>

                            <div
                                x-show="tab === 'mim'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-3"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="grid gap-4 md:grid-cols-2 xl:grid-cols-4"
                                x-cloak
                            >
                                @php
                                    $mimCards = [
                                        ['title' => 'Formação', 'text' => 'Tecnólogo em Sistemas para Internet, com foco em aplicações web e soluções orientadas a negócios.', 'accent' => 'bg-brand-light text-brand-primary'],
                                        ['title' => 'Perfil', 'text' => 'Busco construir sistemas que unem tecnologia, clareza de regra de negócio e boas experiências.', 'accent' => 'bg-sky-50 text-sky-700'],
                                        ['title' => 'Objetivo', 'text' => 'Quero crescer como desenvolvedor backend e em produtos com impacto real para operações.', 'accent' => 'bg-emerald-50 text-emerald-700'],
                                        ['title' => 'Mentalidade', 'text' => 'Valorizo código organizado, arquitetura simples e decisões que deixam a manutenção mais fácil.', 'accent' => 'bg-violet-50 text-violet-700'],
                                    ];
                                @endphp

                                @foreach ($mimCards as $card)
                                    <article class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                                        <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl {{ $card['accent'] }} font-bold">
                                            {{ strtoupper(substr($card['title'], 0, 1)) }}
                                        </div>
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $card['title'] }}</h3>
                                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $card['text'] }}</p>
                                    </article>
                                @endforeach
                            </div>

                            <div
                                x-show="tab === 'stack'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-3"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="grid gap-4 md:grid-cols-2 xl:grid-cols-4"
                                x-cloak
                            >
                                @php
                                    $stackCards = [
                                        ['title' => 'Laravel', 'text' => 'Estrutura principal do sistema, com rotas, autenticação, models e regras de negócio em camada de serviço.', 'accent' => 'bg-red-50 text-red-600'],
                                        ['title' => 'Livewire', 'text' => 'Interface interativa sem perder a produtividade da stack PHP e sem complicar o front-end.', 'accent' => 'bg-cyan-50 text-cyan-700'],
                                        ['title' => 'Tailwind', 'text' => 'Estilo visual rápido, consistente, com foco em clareza e legibilidade em telas de operação.', 'accent' => 'bg-sky-50 text-sky-600'],
                                        ['title' => 'MySQL', 'text' => 'Persistência dos dados de vendas, repasses e reconciliations em estrutura organizada e previsível.', 'accent' => 'bg-orange-50 text-orange-600'],
                                    ];
                                @endphp

                                @foreach ($stackCards as $card)
                                    <article class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                                        <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl {{ $card['accent'] }} font-bold">
                                            {{ strtoupper(substr($card['title'], 0, 1)) }}
                                        </div>
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $card['title'] }}</h3>
                                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $card['text'] }}</p>
                                    </article>
                                @endforeach
                            </div>

                            <div
                                x-show="tab === 'ia'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-3"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="grid gap-4 md:grid-cols-2 xl:grid-cols-4"
                                x-cloak
                            >
                                @php
                                    $iaCards = [
                                        ['title' => 'Validação de ideias', 'text' => 'Usei a IA para validar a estrutura do problema, organizar o escopo e melhorar a clareza do MVP.', 'accent' => 'bg-brand-light text-brand-primary'],
                                        ['title' => 'Geração de código', 'text' => 'A IA ajudou a sugerir trechos de Blade, estrutura de componentes e refinamento do layout.', 'accent' => 'bg-indigo-50 text-indigo-700'],
                                        ['title' => 'Refino técnico', 'text' => 'Também foi útil para revisar nomes, padronização e pequenos ajustes de ergonomia no sistema.', 'accent' => 'bg-emerald-50 text-emerald-700'],
                                        ['title' => 'Aprendizado', 'text' => 'A principal diferença foi usar a IA como apoio de produtividade, sem perder a compreensão do negócio.', 'accent' => 'bg-amber-50 text-amber-700'],
                                    ];
                                @endphp

                                @foreach ($iaCards as $card)
                                    <article class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                                        <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl {{ $card['accent'] }} font-bold">
                                            {{ strtoupper(substr($card['title'], 0, 1)) }}
                                        </div>
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $card['title'] }}</h3>
                                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $card['text'] }}</p>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="border-t border-slate-200 bg-white/80">
                <div class="mx-auto flex max-w-6xl flex-col gap-2 px-5 py-8 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <p>Mini Koncili • Projeto de portfólio para conciliação financeira.</p>
                    <p>Laravel • Livewire • Tailwind</p>
                </div>
            </footer>
        </div>
    </body>
</html>
