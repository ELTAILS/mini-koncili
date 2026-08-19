@props(['tab', 'conteudoCard'])

<div
    x-show="tab === '{{ $tab }}'"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-3"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="grid gap-4 md:grid-cols-2 xl:grid-cols-4"
    x-cloak
>

    @foreach ($conteudoCard as $card)
        <article class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
            <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl {{ $card['accent'] }} font-bold">
                {{ strtoupper(substr($card['title'], 0, 1)) }}
            </div>
            <h3 class="text-lg font-semibold text-slate-900">{{ $card['title'] }}</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">{{ $card['text'] }}</p>
        </article>
    @endforeach

</div>
