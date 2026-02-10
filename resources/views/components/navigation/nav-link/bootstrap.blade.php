{{-- Cube Component: Navigation Link (Bootstrap) --}}

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
<x-cube::nav-link framework="bootstrap" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    Dashboard
</x-cube::nav-link>
--}}
