{{-- Cube Component: Dropdown Link (Tailwind) --}}

<a
    {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-hidden focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out']) }}
>
    {{ $slot }}
</a>

{{-- Usage:
<x-cube::dropdown-link href="{{ route('profile') }}">Profile</x-cube::dropdown-link>
<x-cube::dropdown-link href="{{ route('settings') }}">Settings</x-cube::dropdown-link>
--}}
