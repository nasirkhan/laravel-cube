@props(['for' => '', 'value' => '', 'required' => false])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }} @if($for) for="{{ $for }}" id="{{ $for }}-label" @endif>
    {{ $value ?: $slot }}
    @if($required)
        <span class="text-red-500">*</span>
    @endif
</label>
