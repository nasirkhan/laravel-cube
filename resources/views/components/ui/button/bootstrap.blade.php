{{-- Cube Component: UI Button (Bootstrap) --}}
{{-- Supports: primary, secondary, danger, success, warning, info, light, dark, link variants --}}

<button
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    @if($disabled) aria-disabled="true" @endif
    @if($loading) aria-busy="true" @endif
    {{ $attributes->merge(['class' => $getClasses()]) }}
>
    @if($loading)
        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
    @endif
    {{ $slot }}
</button>

{{-- Usage:
<x-cube::button variant="primary" framework="bootstrap">Save</x-cube::button>
<x-cube::button variant="danger" type="submit" framework="bootstrap">Delete</x-cube::button>
<x-cube::button variant="success" size="sm" framework="bootstrap">Create</x-cube::button>
--}}
