{{-- Cube Component: Form Select (Bootstrap) --}}

@php
    $classes = config('cube.bootstrap.forms.select', 'form-select');
@endphp

<select
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : '' }}
    {{ $attributes->merge(['class' => $classes]) }}
    @if($attributes->has('name') && !$attributes->has('aria-label') && !$attributes->has('aria-labelledby'))
        aria-labelledby="{{ $attributes->get('name') }}-label"
    @endif
>
    {{ $slot }}
</select>

{{-- Usage:
<x-cube::select framework="bootstrap" name="country">
    <option value="">Select a country</option>
    <option value="us">United States</option>
    <option value="ca">Canada</option>
</x-cube::select>
--}}
