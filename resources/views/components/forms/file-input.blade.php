@props(['multiple' => false, 'disabled' => false, 'required' => false, 'accept' => ''])

<input
    type="file"
    {{ $multiple ? 'multiple' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : '' }}
    @if($accept) accept="{{ $accept }}" @endif
    {{ $attributes->merge(['class' => 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 disabled:opacity-50 disabled:cursor-not-allowed']) }}
>
