{{-- Cube Component: Form Textarea (Tailwind) --}}

@php
    $classes = config('cube.tailwind.forms.textarea', 
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
    );
@endphp

<textarea
    rows="{{ $rows }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : '' }}
    @if($placeholder)
        placeholder="{{ $placeholder }}"
    @endif
    {{ $attributes->merge(['class' => $classes]) }}
>{{ $slot }}</textarea>

{{-- Usage:
<x-cube::textarea name="description" rows="4" placeholder="Enter description...">{{ old('description') }}</x-cube::textarea>
<x-cube::textarea name="notes" required />
--}}
