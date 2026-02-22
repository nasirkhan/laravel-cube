{{-- Cube Component: Form Checkbox (Tailwind) --}}

<div class="flex items-center">
    <input
        type="checkbox"
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800']) }}
        @if($attributes->has('name'))
            id="{{ $attributes->get('name') }}"
            @if($slot->isEmpty())
                aria-label="{{ $attributes->get('name') }}"
            @else
                aria-labelledby="{{ $attributes->get('name') }}-label"
            @endif
        @endif
    >
    @if($slot->isNotEmpty())
        <label id="{{ $attributes->get('name') }}-label" {{ $attributes->only(['for'])->class(['ml-2 text-sm text-gray-600 dark:text-gray-400']) }}>
            {{ $slot }}
        </label>
    @endif
</div>

{{-- Usage:
<x-cube::checkbox name="remember">Remember me</x-cube::checkbox>
<x-cube::checkbox name="terms" required>I agree to the terms</x-cube::checkbox>
--}}
