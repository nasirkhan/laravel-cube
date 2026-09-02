@props([
    'rows',
    'searchPlaceholder' => 'Search...',
    'perPageOptions' => [10, 15, 25, 50, 100],
])

<div>
    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4">
        <div class="relative w-full sm:w-72">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm"></i>
            </div>
            <input
                wire:model.live.debounce.300ms="search"
                type="text"
                placeholder="{{ $searchPlaceholder }}"
                class="block w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            />
        </div>
        <select
            wire:model.live="perPage"
            class="text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 p-2 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500"
        >
            @foreach ($perPageOptions as $option)
                <option value="{{ $option }}">{{ $option }} / @lang('page')</option>
            @endforeach
        </select>
    </div>

    {{-- Table --}}
    <div
        class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 transition-opacity duration-150"
        wire:loading.class="opacity-50 pointer-events-none"
    >
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            {{ $slot }}
        </table>
    </div>

    {{-- Pagination --}}
    @if ($rows->hasPages())
        <div class="mt-4">
            {{ $rows->links() }}
        </div>
    @endif
</div>
