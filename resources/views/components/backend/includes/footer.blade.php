<footer class="mt-4 px-4 flex items-center">
    <div>
        @if (setting("show_copyright"))
            <small class="text-sm text-gray-500 dark:text-gray-400">
                @lang("Copyright")
                &copy; {{ date("Y") }}
                <a class="text-gray-500 dark:text-gray-400 hover:underline" href="/">{{ app_name() }}</a>
            </small>
        @endif
    </div>
    <div class="ml-auto"><small class="text-sm text-gray-500 dark:text-gray-400">{!! setting("footer_text") !!}</small></div>
</footer>
