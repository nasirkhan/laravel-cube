@props(["route" => "", "icon" => "fas fa-list", "title" => "List", "small" => "", "class" => ""])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
$baseClasses = "inline-flex items-center font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 m-1 {$sizeClasses} {$class}";
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
