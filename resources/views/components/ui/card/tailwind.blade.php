{{-- Cube Component: UI Card (Tailwind) --}}

<div class="group flex flex-col rounded-2xl border border-gray-200/80 bg-white shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md dark:border-gray-700/60 dark:bg-gray-800">
    @if ($getImage())
        <div class="overflow-hidden rounded-t-2xl">
            <a href="{{ $url }}" @if($isInternalUrl()) wire:navigate @endif>
                <img
                    class="h-48 w-full object-cover transition-transform duration-300 group-hover:scale-105"
                    src="{{ $getImage() }}"
                    alt="{{ $name }}"
                />
            </a>
        </div>
    @endif

    <div class="flex flex-1 flex-col p-5">
        @if ($name)
            <a href="{{ $url }}" @if($isInternalUrl()) wire:navigate @endif class="mb-2 block">
                <h5 class="text-base font-semibold leading-snug text-gray-900 transition-colors duration-150 group-hover:text-indigo-600 sm:text-lg dark:text-gray-100 dark:group-hover:text-indigo-400">
                    {{ $name }}
                </h5>
            </a>
        @endif

        <div class="flex-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
            {!! $slot !!}
        </div>

        @if ($url)
            <div class="mt-4 border-t border-gray-100 pt-4 dark:border-gray-700">
                <a
                    class="inline-flex items-center gap-1 text-sm font-medium text-indigo-600 transition-colors duration-150 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300"
                    href="{{ $url }}"
                    @if($isInternalUrl()) wire:navigate @endif
                >
                    @lang('View details')
                    <svg class="h-4 w-4 transition-transform duration-150 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
