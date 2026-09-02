{{-- Cube Component: Alert
     Flowbite-styled inline alert with optional dismiss.

     Usage:
       <x-cube::alert type="success" message="Saved successfully!" />
       <x-cube::alert type="error" :dismissible="false">Something went wrong.</x-cube::alert>
       Supported types: success | error | warning | info (default)
--}}

<div
    x-data="{ show: true }"
    x-show="show"
    x-cloak
    class="flex items-center p-4 mb-4 text-sm border rounded-lg {{ $colorClasses() }}"
    role="alert"
>
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="flex-1">
        @if (!$slot->isEmpty())
            {{ $slot }}
        @elseif (isset($message))
            {!! $message !!}
        @endif
    </div>

    @if ($dismissible)
        <button
            type="button"
            x-on:click="show = false"
            class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex items-center justify-center h-8 w-8 {{ $closeColorClasses() }}"
            aria-label="{{ __('Close') }}"
        >
            <span class="sr-only">{{ __('Close') }}</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    @endif
</div>
