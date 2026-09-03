{{-- Cube Component: File Input (Tailwind/Flowbite) --}}

@php
    $classes = config('cube.tailwind.forms.file-input',
        'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 disabled:opacity-50 disabled:cursor-not-allowed'
    );
@endphp

<input
    type="file"
    {{ $multiple ? 'multiple' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : '' }}
    @if($accept) accept="{{ $accept }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>

{{-- Usage:
<x-cube::file-input name="image" accept="image/*" />
<x-cube::file-input name="documents" multiple accept=".pdf,.doc,.docx" required />
--}}
