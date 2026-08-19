@props(['nameBtn', 'tab'])

<button
    type="button"
    @click="tab = '{{$tab}}'"
    :class="tab === '{{$tab}}' ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'bg-white text-slate-700 hover:border-brand-primary hover:text-brand-primary'"
    class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold transition"
>
    {{ $nameBtn }}
</button>
