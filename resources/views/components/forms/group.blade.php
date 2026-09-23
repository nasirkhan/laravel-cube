@props(['label' => '', 'name' => '', 'required' => false, 'help' => '', 'error' => null])
@php
$errors = $errors ?? new \Illuminate\Support\ViewErrorBag();
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
