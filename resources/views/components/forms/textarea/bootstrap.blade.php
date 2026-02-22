{{-- Cube Component: Form Textarea (Bootstrap) --}}

@php
    $classes = config('cube.bootstrap.forms.textarea', 'form-control');
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
<x-cube::textarea framework="bootstrap" name="description" rows="4" placeholder="Enter description...">{{ old('description') }}</x-cube::textarea>
<x-cube::textarea framework="bootstrap" name="notes" required />
--}}
