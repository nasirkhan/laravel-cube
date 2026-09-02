<ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center">
        <a href="{{ route('backend.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <i class="fa-solid fa-cubes fa-fw me-1.5 text-gray-400 dark:text-gray-500" aria-hidden="true"></i>
            <span class="hidden sm:inline">{{ __('Dashboard') }}</span>
        </a>
    </li>
    {!! $slot !!}
</ol>
