{{-- Cube Component: File Input (Bootstrap) --}}

@php
    $classes = config('cube.bootstrap.forms.file-input', 'form-control');
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
<x-cube::file-input name="documents" multiple required />
--}}
