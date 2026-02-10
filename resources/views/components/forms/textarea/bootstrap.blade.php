{{-- Cube Component: Form Textarea (Bootstrap) --}}

@php
    $classes = config('cube.bootstrap.forms.textarea', 'form-control');
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
<x-cube::textarea framework="bootstrap" name="description" rows="4" placeholder="Enter description...">{{ old('description') }}</x-cube::textarea>
<x-cube::textarea framework="bootstrap" name="notes" required />
--}}
