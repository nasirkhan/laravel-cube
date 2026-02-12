{{-- Cube Component: UI Link (Tailwind) --}}

<a
    @if ($href) href="{{ $href }}" @endif 
    {{ $attributes->merge(['class' => 'inline-flex items-center border border-transparent hover:underline cursor-pointer font-semibold tracking-widest transition ease-in-out duration-150']) }}
>
    {{ $slot }}
</a>

{{-- Usage:
<x-cube::link href="{{ route('home') }}">Home</x-cube::link>
<x-cube::link wire:click="doSomething">Click me</x-cube::link>
<x-cube::link href="{{ route('profile') }}" wire:navigate>My Profile</x-cube::link>
--}}
