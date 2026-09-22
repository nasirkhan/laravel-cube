@props(['align' => 'right', 'width' => '48', 'contentClasses' => ''])
@php
$contentClasses = $contentClasses ?: 'bg-white py-1 dark:bg-gray-700';

$alignmentClasses = match ($align) {
    'left'  => 'start-0 ltr:origin-top-left rtl:origin-top-right',
    'top'   => 'origin-top',
    default => 'end-0 ltr:origin-top-right rtl:origin-top-left',
};

$widthClasses = match ($width) {
    '56'    => 'w-56',
    '64'    => 'w-64',
    default => 'w-48',
};
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" :aria-expanded="open.toString()">
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
        class="{{ $widthClasses }} {{ $alignmentClasses }} absolute z-50 mt-2 rounded-md shadow-lg"
        role="menu"
        x-bind:aria-hidden="(!open).toString()"
        style="display: none"
        @click="open = false"
    >
        <div class="{{ $contentClasses }} rounded-md ring-1 ring-black/5">
            {{ $content }}
        </div>
    </div>
</div>
