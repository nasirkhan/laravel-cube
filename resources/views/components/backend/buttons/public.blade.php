@props([
    "route" => "",
    "icon" => "fa-solid fa-arrow-up-right-from-square",
    "title",
    "small" => "",
    "class" => "",
])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
@endphp

@if ($route)
    <a
        class="inline-flex items-center font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 ml-1 {{ $sizeClasses }} {{ $class }}"
        href="{{ $route }}"
        title="{{ $title }}"
        aria-label="{{ $title }}"
        target="_blank"
        rel="noopener noreferrer"
    >
        <i class="{{ $icon }} fa-fw" aria-hidden="true"></i>
        {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
    </a>
@endif
