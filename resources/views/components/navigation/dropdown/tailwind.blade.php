{{-- Cube Component: Dropdown (Tailwind) --}}

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-transition:enter="transition duration-200 ease-out"
        x-transition:enter-start="scale-95 opacity-0"
        x-transition:enter-end="scale-100 opacity-100"
        x-transition:leave="transition duration-75 ease-in"
        x-transition:leave-start="scale-100 opacity-100"
        x-transition:leave-end="scale-95 opacity-0"
        class="{{ $getWidthClasses() }} {{ $getAlignmentClasses() }} absolute z-50 mt-2 rounded-md shadow-lg"
        style="display: none"
        @click="open = false"
    >
        <div class="{{ $contentClasses }} rounded-md ring-1 ring-black/5">
            {{ $content }}
        </div>
    </div>
</div>

{{-- Usage:
<x-cube::dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="...">
            Menu
        </button>
    </x-slot>

    <x-slot name="content">
        <x-cube::dropdown-link href="{{ route('profile') }}">Profile</x-cube::dropdown-link>
        <x-cube::dropdown-link href="{{ route('settings') }}">Settings</x-cube::dropdown-link>
    </x-slot>
</x-cube::dropdown>
--}}
