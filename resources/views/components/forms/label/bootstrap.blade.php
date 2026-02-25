{{-- Cube Component: Form Label (Bootstrap) --}}

@php
    $classes = config('cube.bootstrap.forms.label', 'form-label');
@endphp

<label {{ $attributes->merge(['class' => $classes]) }} @if($for) for="{{ $for }}" id="{{ $for }}-label" @endif>
    {{ $value ?? $slot }}
    @if($required)
        <span class="text-danger">*</span>
    @endif
</label>

{{-- Usage:
<x-cube::label for="email" framework="bootstrap" value="Email Address" required />
<x-cube::label for="username" framework="bootstrap">Username</x-cube::label>
--}}
