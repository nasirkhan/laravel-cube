{{-- Cube Component: Form Group (Tailwind/Flowbite) --}}
{{-- Wrapper component that combines label, input, error, and help text --}}

@php
    $errorId = $name && $errors->has($name) ? $name . '-error' : null;
    $ariaDescribedby = collect([$name ? $name . '-label' : null, $help ? $name . '-help' : null, $errorId])
        ->filter()
        ->implode(' ');
@endphp

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if($label)
        <x-cube::label :for="$name" :value="$label" :required="$required" />
    @endif

    {{ $slot->withAttributes(['aria-describedby' => $ariaDescribedby]) }}

    @if($help)
        <p id="{{ $name }}-help" class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($name && $errors->has($name))
        <x-cube::error :messages="$errors->get($name)" :id="$errorId" />
    @endif
</div>

{{-- Usage:
<x-cube::group name="email" label="Email Address" required help="We'll never share your email">
    <x-cube::input type="email" name="email" :value="old('email')" />
</x-cube::group>
--}}
