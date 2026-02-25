{{-- Cube Component: UI Badge (Bootstrap) --}}

<span class="me-1">
    @if ($url)
        <a
            class="badge rounded-pill bg-primary text-decoration-none"
            href="{{ $url }}"
        >
            {{ $text }}
        </a>
    @else
        <span class="badge rounded-pill bg-secondary">
            {{ $text }}
        </span>
    @endif
</span>

{{-- Usage:
<x-cube::badge framework="bootstrap" text="Laravel" url="{{ route('tags.show', 'laravel') }}" />
<x-cube::badge framework="bootstrap" text="PHP" />
--}}
