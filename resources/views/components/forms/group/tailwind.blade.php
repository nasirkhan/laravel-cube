{{-- Cube Component: Form Group (Tailwind) --}}
{{-- Wrapper component that combines label, input, error, and help text --}}

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if($label)
        <x-cube::label :for="$name" :value="$label" :required="$required" />
    @endif

    <div class="mt-1">
        {{ $slot }}
    </div>

    @if($help)
        <p id="{{ $name }}-help" class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($name && $errors->has($name))
        <x-cube::error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>

{{-- Usage:
<x-cube::group name="email" label="Email Address" required help="We'll never share your email">
    <x-cube::input type="email" name="email" :value="old('email')" />
</x-cube::group>
--}}
