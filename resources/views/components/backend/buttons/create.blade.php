@props(["route" => "", "icon" => "fas fa-plus", "title" => "Create", "small" => "", "class" => ""])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
$baseClasses = "inline-flex items-center font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 m-1 {$sizeClasses} {$class}";
@endphp

@if ($route)
    <a
        class="{{ $baseClasses }}"
        href="{{ $route }}"
        title="{{ __($title) }}"
        aria-label="{{ __($title) }}"
    >
        <i class="{{ $icon }} fa-fw" aria-hidden="true"></i>
        {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
    </a>
@else
    <button
        class="{{ $baseClasses }}"
        type="submit"
        title="{{ __($title) }}"
        aria-label="{{ __($title) }}"
    >
        <i class="{{ $icon }} fa-fw" aria-hidden="true"></i>
        {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
    </button>
@endif
