{{-- Cube Component: Form Toggle (Bootstrap) --}}
{{-- Bootstrap form switch component --}}

<div class="form-check form-switch">
    <input
        type="checkbox"
        role="switch"
        {{ $disabled ? 'disabled' : '' }}
        {{ $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'form-check-input']) }}
    >
    @if($slot->isNotEmpty())
        <label {{ $attributes->only(['id', 'for'])->class(['form-check-label']) }}>
            {{ $slot }}
        </label>
    @endif
</div>

{{-- Usage:
<x-cube::toggle framework="bootstrap" name="notifications">Enable notifications</x-cube::toggle>
<x-cube::toggle framework="bootstrap" name="dark_mode" :checked="true">Dark mode</x-cube::toggle>
--}}
