<?php
$notifications = optional(auth()->user())->unreadNotifications;
$notifications_count = optional($notifications)->count();
$notifications_latest = optional($notifications)->take(5);
?>

<div class="relative">
    <button
        id="user-menu-button"
        data-dropdown-toggle="user-menu-dropdown"
        class="flex items-center leading-none text-gray-700 dark:text-gray-300 p-0 focus:outline-none"
        aria-label="Open user menu"
        type="button"
    >
        <span class="inline-block w-8 h-8 rounded-full bg-cover bg-center shrink-0" style="background-image: url({{ asset("img/favicon.png") }})"></span>
        <div class="hidden xl:block pl-2 text-left">
            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</div>
            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ Auth::user()->email }}</div>
        </div>
    </button>

    <div
        id="user-menu-dropdown"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700 dark:divide-gray-600"
    >
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
            <li>
                <a class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route("backend.users.show", Auth::user()->id) }}">
                    <i class="fa-regular fa-user mr-2"></i>
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li>
                <a class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route("backend.notifications.index") }}">
                    <i class="fa-regular fa-bell mr-2"></i>
                    @lang("Notifications")
                    @if ($notifications_count)
                        <span class="ml-2 inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium text-white bg-yellow-400 rounded-full">{{ $notifications_count }}</span>
                    @endif
                </a>
            </li>
        </ul>
        <div class="py-2">
            <a
                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                href="{{ route("logout") }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
                <i class="fa-solid fa-right-from-bracket mr-2"></i>
                @lang("Logout")
            </a>
            <form id="logout-form" style="display: none" action="{{ route("logout") }}" method="POST">@csrf</form>
        </div>
    </div>
</div>
