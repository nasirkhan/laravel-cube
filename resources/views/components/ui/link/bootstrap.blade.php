{{-- Cube Component: UI Link (Bootstrap) --}}

<a
    @if ($href) href="{{ $href }}" @endif 
    {{ $attributes->merge(['class' => 'link-primary text-decoration-none fw-bold']) }}
>
    {{ $slot }}
</a>

{{-- Usage:
<x-cube::link framework="bootstrap" href="{{ route('home') }}">Home</x-cube::link>
<x-cube::link framework="bootstrap" wire:click="doSomething">Click me</x-cube::link>
--}}
