<div class="relative mr-2">
    <button
        id="language-menu-button"
        data-dropdown-toggle="language-menu-dropdown"
        class="flex items-center leading-none text-gray-700 dark:text-gray-300 focus:outline-none"
        aria-label="Open language menu"
        type="button"
    >
        <svg
            class="shrink-0"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 5h7" />
            <path d="M9 3v2c0 4.418 -2.239 8 -5 8" />
            <path d="M5 9c0 2.144 2.952 3.908 6.7 4" />
            <path d="M12 20l4 -9l4 9" />
            <path d="M19.1 18h-6.2" />
        </svg>
        &nbsp;<span class="text-sm font-medium">{{ strtoupper(App::getLocale()) }}</span>
    </button>

    <div
        id="language-menu-dropdown"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700"
    >
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
            @foreach (config("app.available_locales") as $locale_code => $locale_name)
                <li>
                    <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route("language.switch", $locale_code) }}">{{ $locale_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
