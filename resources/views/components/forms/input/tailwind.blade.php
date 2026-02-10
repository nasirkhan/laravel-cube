{{-- Cube Component: Form Input (Tailwind) --}}

@php
    $classes = config('cube.tailwind.forms.input', 
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
    );
@endphp

<input
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : '' }}
    @if($placeholder)
        placeholder="{{ $placeholder }}"
    @endif
    {{ $attributes->merge(['class' => $classes]) }}
>

{{-- Usage:
<x-cube::input type="email" name="email" :value="old('email')" required />
<x-cube::input type="password" name="password" required />
<x-cube::input type="text" name="username" placeholder="Enter username" />
--}}
