@props([
    'column' => null,
    'sortCol' => '',
    'sortDir' => 'asc',
])

@if ($column)
    <th
        wire:click="sort('{{ $column }}')"
        class="px-4 py-3 cursor-pointer select-none hover:bg-gray-100 dark:hover:bg-gray-600 {{ $attributes->get('class') }}"
    >
        <span class="flex items-center gap-1.5 whitespace-nowrap">
            {{ $slot }}
            @if ($sortCol === $column)
                <i class="fa-solid fa-sort-{{ $sortDir === 'asc' ? 'up' : 'down' }} text-blue-500 text-xs"></i>
            @else
                <i class="fa-solid fa-sort text-gray-300 dark:text-gray-600 text-xs"></i>
            @endif
        </span>
    </th>
@else
    <th class="px-4 py-3 {{ $attributes->get('class') }}">{{ $slot }}</th>
@endif
