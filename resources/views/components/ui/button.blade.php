@props(['type' => 'button', 'variant' => 'primary', 'disabled' => false, 'loading' => false, 'size' => 'md'])
@php
$type = in_array($type, ['submit', 'button', 'reset']) ? $type : 'button';

$classes = match ($variant) {
    'secondary' => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    'danger'    => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-hidden focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    'success'   => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-hidden focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    'warning'   => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-hidden focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    'info'      => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-hidden focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    'light'     => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-hidden focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    'dark'      => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-gray-900 dark:bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 focus:outline-hidden focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    'link'      => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-transparent border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:text-gray-900 dark:hover:text-gray-100 hover:underline focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
    default     => 'inline-flex items-center justify-center px-4 py-2 cursor-pointer bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 disabled:cursor-not-allowed transition ease-in-out duration-150',
};

$sizeClasses = match ($size) {
    'sm'    => 'px-3 py-1.5 text-xs',
    'lg'    => 'px-6 py-3 text-base',
    default => '',
};

if ($sizeClasses) {
    $classes .= ' ' . $sizeClasses;
}
@endphp

<button
    type="{{ $type }}"
    {{ $disabled || $loading ? 'disabled' : '' }}
    @if($disabled || $loading) aria-disabled="true" @endif
    @if($loading) aria-busy="true" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($loading)
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @endif
    {{ $slot }}
</button>
