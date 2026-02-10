{{-- Cube Component: Form Input (Bootstrap) --}}

@php
    $classes = config('cube.bootstrap.forms.input', 'form-control');
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
<x-cube::input type="email" name="email" framework="bootstrap" :value="old('email')" required />
<x-cube::input type="password" name="password" framework="bootstrap" required />
<x-cube::input type="text" name="username" framework="bootstrap" placeholder="Enter username" />
--}}
