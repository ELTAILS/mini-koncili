@props(['tab', 'label'])

<button @click="tab = '{{ $tab }}'"
    :class="tab === '{{ $tab }}' ? 'bg-blue-700 text-white' : 'bg-gray-200'"
    class="px-4 py-2 rounded">
    {{ $label }}
</button>
