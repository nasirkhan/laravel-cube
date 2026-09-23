@props(["small" => ""])

@php
$sizeClasses = $small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm";
@endphp

<button
    type="button"
    onclick="window.history.back()"
    class="inline-flex items-center font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 m-1 {{ $sizeClasses }}"
    title="{{ __("Cancel") }}"
    aria-label="{{ __('Cancel') }}"
>
    <i class="fas fa-reply fa-fw" aria-hidden="true"></i>
    {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
</button>
