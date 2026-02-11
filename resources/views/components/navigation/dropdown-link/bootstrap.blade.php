{{-- Cube Component: Dropdown Link (Bootstrap) --}}

<li>
    <a {{ $attributes->merge(['class' => 'dropdown-item']) }}>
        {{ $slot }}
    </a>
</li>

{{-- Usage:
<x-cube::dropdown-link framework="bootstrap" href="{{ route('profile') }}">Profile</x-cube::dropdown-link>
<x-cube::dropdown-link framework="bootstrap" href="{{ route('settings') }}">Settings</x-cube::dropdown-link>
--}}
