{{-- Cube Component: Form Checkbox (Tailwind/Flowbite) --}}

@php
    $elementId = $attributes->get('id') ?: ($attributes->has('name') ? $attributes->get('name') : null);
@endphp

<div class="flex items-center">
    <input
        type="checkbox"
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $checked ? 'checked' : '' }}
        {{ $autofocus ? 'autofocus' : '' }}
        {{ $attributes->except('id')->merge(['class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600']) }}
        @if($elementId)
            id="{{ $elementId }}"
            @if($slot->isEmpty())
                aria-label="{{ $elementId }}"
            @else
                aria-labelledby="{{ $elementId }}-label"
            @endif
        @endif
    >
    @if($slot->isNotEmpty())
        <label id="{{ $elementId }}-label" {{ $attributes->only(['for'])->class(['ms-2 text-sm font-medium text-gray-900 dark:text-gray-300']) }}>
            {{ $slot }}
        </label>
    @endif
</div>

{{-- Usage:
<x-cube::checkbox name="remember">Remember me</x-cube::checkbox>
<x-cube::checkbox name="terms" required>I agree to the terms</x-cube::checkbox>
<x-cube::checkbox name="roles[]" id="role-1" value="admin" :checked="true">Admin</x-cube::checkbox>
--}}
