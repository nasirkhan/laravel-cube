@props([
    "route" => "",
    "icon" => "fa-solid fa-arrow-up-right-from-square",
    "title",
    "small" => "",
    "class" => "",
])

@php
$iconOnly = $slot == "";
$sizeClasses = $iconOnly
    ? "size-9 p-2"
    : ($small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm");
$baseClasses = "inline-flex items-center justify-center cursor-pointer font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 m-1 {$sizeClasses} {$class}";
@endphp

@if ($route)
    <a
        class="{{ $baseClasses }}"
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
