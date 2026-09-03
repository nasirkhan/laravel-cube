{{-- Cube Component: Form Label (Tailwind/Flowbite) --}}

@php
    $classes = config('cube.tailwind.forms.label',
        'block mb-2 text-sm font-medium text-gray-900 dark:text-white'
    );
@endphp

<label {{ $attributes->merge(['class' => $classes]) }} @if($for) for="{{ $for }}" id="{{ $for }}-label" @endif>
    {{ $value ?? $slot }}
    @if($required)
        <span class="text-red-500">*</span>
    @endif
</label>

{{-- Usage:
<x-cube::label for="email" value="Email Address" required />
<x-cube::label for="username">Username</x-cube::label>
--}}
