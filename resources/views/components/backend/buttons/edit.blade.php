@props([
    "route" => "",
    "icon" => "fas fa-wrench",
    "title",
    "small" => "",
    "class" => "",
])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
$baseClasses = "inline-flex items-center font-medium text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-50 dark:border-blue-400 dark:text-blue-400 m-1 {$sizeClasses} {$class}";
@endphp

@if ($route)
    <a
        class="{{ $baseClasses }}"
        href="{{ $route }}"
        wire:navigate
        title="{{ $title }}"
        aria-label="{{ $title }}"
    >
        <i class="{{ $icon }} fa-fw" aria-hidden="true"></i>
        {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
    </a>
@else
    <button
        class="{{ $baseClasses }}"
        type="submit"
        title="{{ $title }}"
        aria-label="{{ $title }}"
    >
        <i class="{{ $icon }} fa-fw" aria-hidden="true"></i>
        {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
    </button>
@endif
