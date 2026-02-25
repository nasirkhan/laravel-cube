{{-- Cube Component: Form Input (Bootstrap) --}}

@php
    $classes = config('cube.bootstrap.forms.input', 'form-control');
@endphp

<input
    type="{{ $type }}"
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
<x-cube::input type="email" name="email" framework="bootstrap" :value="old('email')" required />
<x-cube::input type="password" name="password" framework="bootstrap" required />
<x-cube::input type="text" name="username" framework="bootstrap" placeholder="Enter username" />
--}}
