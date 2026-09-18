@props(["small" => "true"])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
@endphp

<button
    onclick="window.history.back();"
    class="inline-flex items-center font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900 m-1 {{ $sizeClasses }}"
    title="{{ __("Return Back") }}"
    aria-label="{{ __('Return Back') }}"
>
    <i class="fas fa-reply fa-fw" aria-hidden="true"></i>
    {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
</button>
