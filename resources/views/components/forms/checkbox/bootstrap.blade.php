{{-- Cube Component: Form Checkbox (Bootstrap) --}}

<div class="form-check">
    <input
        type="checkbox"
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
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
<x-cube::checkbox framework="bootstrap" name="remember">Remember me</x-cube::checkbox>
<x-cube::checkbox framework="bootstrap" name="terms" required>I agree to the terms</x-cube::checkbox>
--}}
