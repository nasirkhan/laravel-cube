@props(["small" => "", "class" => ""])

@php
$iconOnly = $slot == "";
$sizeClasses = $iconOnly
    ? "size-9 p-2"
    : ($small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm");
@endphp

{{-- Anchor tag: safe inside forms — will never trigger form submission --}}
<a
    href="#"
    onclick="event.preventDefault(); window.history.back();"
    class="inline-flex items-center justify-center cursor-pointer font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 m-1 {{ $sizeClasses }} {{ $class }}"
    title="{{ __('Cancel') }}"
    aria-label="{{ __('Cancel') }}"
>
    <i class="fas fa-reply fa-fw" aria-hidden="true"></i>
    {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
</a>
