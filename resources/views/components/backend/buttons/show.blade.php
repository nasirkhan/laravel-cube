@props([
    "route" => "",
    "icon" => "fas fa-desktop",
    "title",
    "small" => "",
    "class" => "",
])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
$baseClasses = "inline-flex items-center font-medium text-white bg-cyan-600 rounded-lg hover:bg-cyan-700 m-1 {$sizeClasses} {$class}";
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
