{{-- Cube Component: Form Toggle (Tailwind) --}}
{{-- iOS-style toggle switch using Tailwind and Alpine.js --}}

<div x-data="{ checked: {{ $checked ? 'true' : 'false' }} }" class="flex items-center">
    <button
        type="button"
        x-on:click="checked = !checked"
        {{ $disabled ? 'disabled' : '' }}
        x-bind:aria-checked="checked.toString()"
        @if($attributes->has('name'))
            @if($slot->isEmpty())
                aria-label="{{ $attributes->get('name') }}"
            @else
                aria-labelledby="{{ $attributes->get('name') }}-toggle-label"
            @endif
        @endif
        role="switch"
        {{ $attributes->merge(['class' => 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2']) }}
        x-bind:class="checked ? 'bg-indigo-600' : 'bg-gray-200 dark:bg-gray-700'"
    >
        <span
            aria-hidden="true"
            x-bind:class="checked ? 'translate-x-5' : 'translate-x-0'"
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
        ></span>
    </button>

    <input type="hidden" x-bind:value="checked ? '1' : '0'" {{ $attributes->only('name') }}>

    @if($slot->isNotEmpty())
        <span id="{{ $attributes->get('name') }}-toggle-label" class="ml-3 text-sm text-gray-900 dark:text-gray-100">{{ $slot }}</span>
    @endif
</div>

{{-- Usage:
<x-cube::toggle name="notifications">Enable notifications</x-cube::toggle>
<x-cube::toggle name="dark_mode" :checked="true">Dark mode</x-cube::toggle>
--}}
