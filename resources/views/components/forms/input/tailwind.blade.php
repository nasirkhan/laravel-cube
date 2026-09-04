{{-- Cube Component: Form Input (Tailwind/Flowbite) --}}

@php
    $classes = config('cube.tailwind.forms.input',
        'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 disabled:opacity-50 disabled:cursor-not-allowed'
    );
@endphp

<input
    type="{{ $type }}"
    @if(!$attributes->has('id') && $attributes->has('name'))
        id="{{ $attributes->get('name') }}"
    @endif
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    @if($placeholder)
        placeholder="{{ $placeholder }}"
    @endif
    {{ $attributes->merge(['class' => $classes]) }}
    @if($attributes->has('name') && !$attributes->has('aria-label') && !$attributes->has('aria-labelledby'))
        aria-labelledby="{{ $attributes->get('name') }}-label"
    @endif
>

{{-- Usage:
<x-cube::input type="email" name="email" :value="old('email')" required />
<x-cube::input type="password" name="password" required />
<x-cube::input type="text" name="username" placeholder="Enter username" />
--}}
