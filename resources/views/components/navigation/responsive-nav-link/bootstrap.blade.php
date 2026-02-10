{{-- Cube Component: Responsive Navigation Link (Bootstrap) --}}
{{-- Mobile navigation variant --}}

@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active'
            : 'nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

{{-- Usage:
<x-cube::responsive-nav-link framework="bootstrap" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    Dashboard
</x-cube::responsive-nav-link>
--}}
