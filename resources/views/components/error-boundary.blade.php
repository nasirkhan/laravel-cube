{{-- Cube Component: Error Boundary Fallback --}}
{{-- Shown when a component fails to render. Check application logs for details. --}}

@if(config('app.debug'))
    <span
        class="inline-flex items-center gap-1 border border-red-400 bg-red-50 text-red-600 dark:bg-red-950 dark:border-red-600 dark:text-red-400 text-xs px-2 py-1 rounded font-mono"
        role="alert"
        aria-label="{{ __('Component rendering error') }}"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 3a9 9 0 100 18A9 9 0 0012 3z" />
        </svg>
        {{ __('Component error') }}
    </span>
@endif
