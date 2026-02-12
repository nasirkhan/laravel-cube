{{-- Cube Component: UI Button Link (Tailwind) --}}
{{-- Anchor tag styled as a button --}}

@php
$variantClasses = match($variant) {
    'primary' => 'bg-gray-800 hover:bg-gray-700 active:bg-gray-900 text-white',
    'secondary' => 'bg-gray-600 hover:bg-gray-500 active:bg-gray-700 text-white',
    'danger' => 'bg-red-600 hover:bg-red-700 active:bg-red-800 text-white',
    'success' => 'bg-green-600 hover:bg-green-700 active:bg-green-800 text-white',
    'warning' => 'bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 text-white',
    'info' => 'bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white',
    default => 'bg-gray-800 hover:bg-gray-700 active:bg-gray-900 text-white',
};

$baseClasses = 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-hidden focus:ring-3 ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer';
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }}
>
    {{ $slot }}
</a>

{{-- Usage:
<x-cube::button-link href="{{ route('login') }}">Login</x-cube::button-link>
<x-cube::button-link href="{{ route('register') }}" variant="success">Register</x-cube::button-link>
<x-cube::button-link href="{{ route('home') }}" variant="secondary">Go Home</x-cube::button-link>
--}}
