@props(["small" => "", "class" => ""])

@php
$iconOnly = $slot == "";
$sizeClasses = $iconOnly
    ? "size-9 p-2"
    : ($small == "true" ? "px-3 py-1.5 text-xs" : "px-4 py-2 text-sm");
$baseClasses = "inline-flex items-center justify-center cursor-pointer font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 m-1 {$sizeClasses} {$class}";
@endphp

<button
    type="submit"
    class="{{ $baseClasses }}"
    title="{{ __('Save') }}"
    aria-label="{{ __('Save') }}"
>
    <i class="fa-solid fa-floppy-disk fa-fw" aria-hidden="true"></i>
    {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
</button>
