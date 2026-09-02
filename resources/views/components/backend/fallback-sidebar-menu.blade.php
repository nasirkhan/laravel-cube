{{-- Fallback Sidebar Menu: Load menu items from menu_data.json (in case dynamic menu is empty) --}}
@php
    // Load menu data from PHP files
    $files = glob(base_path('Modules/*/database/seeders/data/menu_data.php'));
    $fallbackMenuItems = collect();
    
    if (!empty($files)) {
        $allMenus = [];
        $allMenuItems = [];

        foreach ($files as $file) {
            $data = require $file;
            if (isset($data['menus']) && is_array($data['menus'])) {
                $allMenus = array_merge($allMenus, $data['menus']);
            }
            if (isset($data['menu_items']) && is_array($data['menu_items'])) {
                $allMenuItems = array_merge($allMenuItems, $data['menu_items']);
            }
        }
        
        // Find admin-sidebar menu
        $adminMenu = collect($allMenus)
            ->where('location', 'admin-sidebar')
            ->where('is_active', true)
            ->where('is_visible', true)
            ->first();
        
        if ($adminMenu) {
            // Get menu items for this menu
            $menuItems = collect($allMenuItems)
                ->where('menu_id', $adminMenu['id'])
                ->where('is_active', true)
                ->where('is_visible', true)
                ->sortBy('sort_order');
            
            // Build hierarchy
            $itemsById = $menuItems->keyBy('id');
            $fallbackMenuItems = $menuItems->where('parent_id', null)->values();
            
            // Add children to each parent item
            foreach ($fallbackMenuItems as $item) {
                $children = $menuItems->where('parent_id', $item['id'])->sortBy('sort_order')->values();
                $item['children'] = $children->toArray();
            }
        }
    }
    
    // Get notifications count for badge display
    $notifications = optional(auth()->user())->unreadNotifications;
    $notifications_count = optional($notifications)->count();
@endphp

<ul class="space-y-1">
    @php
        $linkBase    = 'flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors';
        $linkActive  = 'bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400';
        $linkDefault = 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700';
    @endphp
    @if($fallbackMenuItems->isNotEmpty())
        @foreach($fallbackMenuItems as $item)
            @if($item['type'] === 'divider')
                <li class="my-2 border-t border-gray-200 dark:border-gray-700"></li>
            @elseif($item['type'] === 'heading')
                <li class="px-3 pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">{{ $item['name'] }}</li>
            @elseif($item['type'] === 'dropdown' && !empty($item['children']))
                @php
                    $anyChildActive = collect($item['children'])->contains(fn($c) => $c['route_name'] && request()->routeIs($c['route_name']));
                @endphp
                <li x-data="{ open: {{ $anyChildActive ? 'true' : 'false' }} }">
                    <button type="button" @click="open = !open"
                        class="{{ $linkBase }} {{ $anyChildActive ? $linkActive : $linkDefault }} w-full justify-between">
                        <span class="flex items-center">
                            <i class="{{ $item['icon'] ?? 'fa-solid fa-link' }} fa-fw mr-3" aria-hidden="true"></i>
                            {{ $item['name'] }}
                        </span>
                        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul x-show="open" class="mt-1 pl-4 space-y-1">
                        @foreach($item['children'] as $child)
                            @php
                                $childUrl = '#';
                                if ($child['route_name'] && \Illuminate\Support\Facades\Route::has($child['route_name'])) {
                                    try { $childUrl = route($child['route_name'], $child['route_parameters'] ?? []); }
                                    catch (\Exception $e) { $childUrl = $child['url'] ?? '#'; }
                                } elseif ($child['url']) { $childUrl = $child['url']; }
                                $childIsActive = $child['route_name'] && request()->routeIs($child['route_name']);
                            @endphp
                            <li>
                                <a href="{{ $childUrl }}"
                                   class="{{ $linkBase }} {{ $childIsActive ? $linkActive : $linkDefault }}"
                                   @if($child['opens_new_tab'] ?? false) target="_blank" @endif>
                                    <i class="{{ $child['icon'] ?? 'fa-solid fa-link' }} fa-fw mr-3 shrink-0" aria-hidden="true"></i>
                                    {{ $child['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                @php
                    $itemUrl = '#';
                    if ($item['route_name'] && \Illuminate\Support\Facades\Route::has($item['route_name'])) {
                        try { $itemUrl = route($item['route_name'], $item['route_parameters'] ?? []); }
                        catch (\Exception $e) { $itemUrl = $item['url'] ?? '#'; }
                    } elseif ($item['url']) { $itemUrl = $item['url']; }
                    $itemIsActive = $item['route_name'] && request()->routeIs($item['route_name']);
                @endphp
                <li>
                    <a href="{{ $itemUrl }}"
                       class="{{ $linkBase }} {{ $itemIsActive ? $linkActive : $linkDefault }}"
                       @if($item['opens_new_tab'] ?? false) target="_blank" @endif>
                        <i class="{{ $item['icon'] ?? 'fa-solid fa-link' }} fa-fw mr-3 shrink-0" aria-hidden="true"></i>
                        <span class="flex-1">{{ $item['name'] }}</span>
                        @if($item['route_name'] === 'backend.notifications.index' && $notifications_count)
                            <span class="ml-auto inline-flex items-center justify-center w-5 h-5 text-xs font-semibold text-white bg-blue-600 rounded-full">{{ $notifications_count }}</span>
                        @endif
                    </a>
                </li>
            @endif
        @endforeach
    @else
        {{-- Final fallback: Basic hardcoded menu items --}}
        <li>
            <a class="{{ $linkBase }} {{ request()->routeIs('backend.dashboard') ? $linkActive : $linkDefault }}" href="{{ route('backend.dashboard') }}">
                <i class="fa-solid fa-cubes fa-fw mr-3 shrink-0" aria-hidden="true"></i>
                @lang('Dashboard')
            </a>
        </li>
        <li>
            <a class="{{ $linkBase }} {{ request()->routeIs('backend.notifications.index') ? $linkActive : $linkDefault }}" href="{{ route('backend.notifications.index') }}">
                <i class="fa-regular fa-bell fa-fw mr-3 shrink-0" aria-hidden="true"></i>
                <span class="flex-1">@lang('Notifications')</span>
                @if ($notifications_count)
                    <span class="ml-auto inline-flex items-center justify-center w-5 h-5 text-xs font-semibold text-white bg-blue-600 rounded-full">{{ $notifications_count }}</span>
                @endif
            </a>
        </li>
    @endif
</ul>
