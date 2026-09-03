{{-- Cube Component: Form Textarea (Tailwind/Flowbite) --}}

@php
    $classes = config('cube.tailwind.forms.textarea',
        'block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 disabled:opacity-50 disabled:cursor-not-allowed'
    );
@endphp

<textarea
    rows="{{ $rows }}"
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
>{{ $slot }}</textarea>

{{-- Usage:
<x-cube::textarea name="description" rows="4" placeholder="Enter description...">{{ old('description') }}</x-cube::textarea>
<x-cube::textarea name="notes" required />
--}}
