@props(['item', 'optimized' => false])

@php
    if (!$optimized) {
        $permissions = [];
        if ($item->permissions && is_array($item->permissions)) {
            $permissions = $item->permissions;
        } elseif ($item->permissions && is_string($item->permissions)) {
            $permissions = [$item->permissions];
        }

        $canSee = true;
        if (!empty($permissions)) {
            $canSee = false;
            foreach ($permissions as $permission) {
                if (auth()->check() && auth()->user()->can($permission)) {
                    $canSee = true;
                    break;
                }
            }
        }

        if (empty($permissions) && $item->roles && is_array($item->roles) && !empty($item->roles)) {
            $canSee = false;
            if (auth()->check()) {
                foreach ($item->roles as $role) {
                    if (auth()->user()->hasRole($role)) { $canSee = true; break; }
                }
            }
        }

        if ($item->is_public) $canSee = true;
        if (!$canSee) return;
    }

    $url = '#';
    if ($item->route_name && \Illuminate\Support\Facades\Route::has($item->route_name)) {
        try { $url = route($item->route_name, $item->route_parameters ?? []); }
        catch (\Exception $e) { $url = $item->url ?? '#'; }
    } elseif ($item->url) {
        $url = $item->url;
    }

    $icon     = $item->icon ?? 'fa-solid fa-link';
    $text     = $item->name;
    $hasChildren = isset($item->children) && $item->children instanceof \Illuminate\Support\Collection && $item->children->isNotEmpty();
    $isActive = $item->route_name && request()->routeIs($item->route_name);

    $linkBase    = 'flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors';
    $linkActive  = 'bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400';
    $linkDefault = 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700';
@endphp

@if ($item->type === 'divider')
    <li class="my-2 border-t border-gray-200 dark:border-gray-700"></li>
@elseif ($item->type === 'heading')
    <li class="px-3 pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
        {{ $text }}
    </li>
@elseif ($hasChildren)
    <li x-data="{ open: {{ $isActive ? 'true' : 'false' }} }">
        <button
            type="button"
            @click="open = !open"
            class="{{ $linkBase }} {{ $isActive ? $linkActive : $linkDefault }} w-full justify-between"
        >
            <span class="flex items-center">
                <i class="{{ $icon }} fa-fw mr-3" aria-hidden="true"></i>
                {{ $text }}
            </span>
            <svg
                class="w-4 h-4 transition-transform"
                :class="open ? 'rotate-180' : ''"
                fill="none" viewBox="0 0 24 24" stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <ul x-show="open" class="mt-1 pl-4 space-y-1">
            @foreach (($item->children ?? collect()) as $child)
                @include('cube::components.backend.dynamic-menu-item', ['item' => $child, 'optimized' => $optimized])
            @endforeach
        </ul>
    </li>
@else
    <li>
        <a
            href="{{ $url }}"
            class="{{ $linkBase }} {{ $isActive ? $linkActive : $linkDefault }}"
            @if ($item->target ?? $item->opens_new_tab) target="_blank" @else wire:navigate @endif
            @if ($item->description) title="{{ $item->description }}" @endif
        >
            <i class="{{ $icon }} fa-fw mr-3 shrink-0" aria-hidden="true"></i>
            <span class="flex-1">{{ $text }}</span>

            @if ($item->route_name === 'backend.notifications.index')
                @php
                    static $cachedNotificationCount = null;
                    if ($cachedNotificationCount === null) {
                        $cachedNotificationCount = optional(optional(auth()->user())->unreadNotifications)->count() ?: 0;
                    }
                @endphp
                @if ($cachedNotificationCount > 0)
                    <span class="ml-auto inline-flex items-center justify-center w-5 h-5 text-xs font-semibold text-white bg-blue-600 rounded-full">
                        {{ $cachedNotificationCount }}
                    </span>
                @endif
            @elseif ($item->badge_text)
                <span class="ml-auto inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium text-white bg-{{ $item->badge_color ?? 'blue' }}-600 rounded-full">
                    {{ $item->badge_text }}
                </span>
            @endif
        </a>
    </li>
@endif
