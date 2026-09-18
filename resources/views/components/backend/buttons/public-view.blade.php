@props(["href" => "", "small" => "true", "text" => "Public View"])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
@endphp

<a
    class="inline-flex items-center font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700 {{ $sizeClasses }}"
    href="{{ $href }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="{{ __($text) }}"
>
    <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
    {!! $text != "" ? "&nbsp;" . $text : "" !!}
    {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
</a>
