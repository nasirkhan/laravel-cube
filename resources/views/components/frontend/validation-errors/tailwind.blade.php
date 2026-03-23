@if ($errors->any())
    <div class="mb-4 rounded-lg border border-red-300 bg-red-50 p-4 dark:border-red-600 dark:bg-gray-800" role="alert">
        <div class="mb-2 flex items-center gap-2 text-sm font-semibold text-red-800 dark:text-red-400">
            <svg class="size-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            {{ __("Please fix the following errors & try again!") }}
        </div>
        <ul class="ml-6 list-disc space-y-1 text-sm text-red-700 dark:text-red-400">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
