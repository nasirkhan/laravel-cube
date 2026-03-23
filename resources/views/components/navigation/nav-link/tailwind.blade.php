{{-- Cube Component: Navigation Link (Tailwind) --}}

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

{{-- Usage:
<x-cube::nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    Dashboard
</x-cube::nav-link>
--}}
