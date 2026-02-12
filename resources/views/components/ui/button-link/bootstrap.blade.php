{{-- Cube Component: UI Button Link (Bootstrap) --}}
{{-- Anchor tag styled as a button --}}

@php
$variantClass = match($variant) {
    'primary' => 'btn-primary',
    'secondary' => 'btn-secondary',
    'danger' => 'btn-danger',
    'success' => 'btn-success',
    'warning' => 'btn-warning',
    'info' => 'btn-info',
    'light' => 'btn-light',
    'dark' => 'btn-dark',
    default => 'btn-primary',
};
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => "btn $variantClass"]) }}
>
    {{ $slot }}
</a>

{{-- Usage:
<x-cube::button-link framework="bootstrap" href="{{ route('login') }}">Login</x-cube::button-link>
<x-cube::button-link framework="bootstrap" href="{{ route('register') }}" variant="success">Register</x-cube::button-link>
--}}
