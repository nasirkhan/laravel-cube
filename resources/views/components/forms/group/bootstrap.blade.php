{{-- Cube Component: Form Group (Bootstrap) --}}
{{-- Wrapper component that combines label, input, error, and help text --}}

@php
    $errorId = $name && $errors->has($name) ? $name . '-error' : null;
    $ariaDescribedby = collect([$name ? $name . '-label' : null, $help ? $name . '-help' : null, $errorId])
        ->filter()
        ->implode(' ');
@endphp

<div {{ $attributes->merge(['class' => 'mb-3']) }}>
    @if($label)
        <x-cube::label framework="bootstrap" :for="$name" :value="$label" :required="$required" />
    @endif

    {{ $slot->withAttributes(['aria-describedby' => $ariaDescribedby]) }}

    @if($help)
        <div id="{{ $name }}-help" class="form-text">{{ $help }}</div>
    @endif

    @if($name && $errors->has($name))
        <x-cube::error framework="bootstrap" :messages="$errors->get($name)" :id="$errorId" />
    @endif
</div>

{{-- Usage:
<x-cube::group framework="bootstrap" name="email" label="Email Address" required help="We'll never share your email">
    <x-cube::input framework="bootstrap" type="email" name="email" :value="old('email')" />
</x-cube::group>
--}}
