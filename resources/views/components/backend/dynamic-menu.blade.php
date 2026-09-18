@props(['location' => 'admin-sidebar', 'cssClass' => 'sidebar-nav', 'containerTag' => 'ul'])

@php
    use Nasirkhan\ModuleManager\Modules\Menu\Models\Menu;

    try {
        $user = auth()->user();
        $currentLocale = app()->getLocale();

        // Get cached menu data - this includes all processing and hierarchy building
        $processedMenus = Menu::getCachedMenuData($location, $user, $currentLocale);
    } catch (\Throwable $e) {
        \Illuminate\Support\Facades\Log::error('dynamic-menu failed to load menu data: '.$e->getMessage());
        $processedMenus = collect();
    }
@endphp

@if($processedMenus->isNotEmpty())
    <{{ $containerTag }} class="{{ $cssClass }}">
        @foreach($processedMenus as $menu)
            @if($menu->hierarchicalItems && $menu->hierarchicalItems->isNotEmpty())
                @foreach($menu->hierarchicalItems as $menuItem)
                    @include('cube::components.backend.dynamic-menu-item', ['item' => $menuItem, 'optimized' => true])
                @endforeach
            @endif
        @endforeach
    </{{ $containerTag }}>
@endif
