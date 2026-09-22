@props(['url' => '', 'text' => ''])
@php
$isInternalUrl = $url && !preg_match('/^(https?:|mailto:|tel:|#)/', $url);
@endphp

<span class="m-1 inline-flex break-words">
    @if ($url)
        <a
            class="mb-1 me-1 rounded border border-gray-200 bg-gray-50 px-2.5 py-0.5 text-xs font-medium text-gray-700 hover:bg-gray-100 focus:outline-hidden dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
            href="{{ $url }}"
            @if($isInternalUrl) wire:navigate @endif
        >
            {{ $text }}
        </a>
    @else
        <span
            class="mb-1 me-1 rounded border border-gray-200 bg-gray-50 px-2.5 py-0.5 text-xs font-medium text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300"
        >
            {{ $text }}
        </span>
    @endif
</span>
