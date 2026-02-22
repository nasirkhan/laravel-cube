{{-- Cube Component: Form Label (Tailwind) --}}

@php
    $classes = config('cube.tailwind.forms.label',
        'block font-medium text-sm text-gray-700 dark:text-gray-300'
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
