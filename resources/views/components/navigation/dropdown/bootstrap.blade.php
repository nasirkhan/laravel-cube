{{-- Cube Component: Dropdown (Bootstrap) --}}

<div class="dropdown">
    <div data-bs-toggle="dropdown" aria-expanded="false">
        {{ $trigger }}
    </div>

    <ul class="dropdown-menu {{ $getAlignmentClasses() }} {{ $contentClasses }}">
        {{ $content }}
    </ul>
</div>

{{-- Usage:
<x-cube::dropdown framework="bootstrap" align="right">
    <x-slot name="trigger">
        <button class="btn btn-secondary dropdown-toggle">
            Menu
        </button>
    </x-slot>

    <x-slot name="content">
        <x-cube::dropdown-link framework="bootstrap" href="{{ route('profile') }}">Profile</x-cube::dropdown-link>
        <x-cube::dropdown-link framework="bootstrap" href="{{ route('settings') }}">Settings</x-cube::dropdown-link>
    </x-slot>
</x-cube::dropdown>
--}}
