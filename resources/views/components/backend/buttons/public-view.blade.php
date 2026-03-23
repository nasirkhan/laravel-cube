@props(["href" => "", "small" => "true", "text" => "Public View"])
<a
    class="btn btn-light {{ $small == "true" ? "btn-sm" : "" }}"
    href="{{ $href }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="{{ __($text) }}"
>
    <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
    {!! $text != "" ? "&nbsp;" . $text : "" !!}
    {!! $slot != "" ? "&nbsp;" . $slot : "" !!}
</a>
