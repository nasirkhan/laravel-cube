<?php

namespace Nasirkhan\LaravelCube;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CubeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cube');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/cube'),
        ], 'cube-views');

        $this->publishes([
            __DIR__.'/../config/cube.php' => config_path('cube.php'),
        ], 'cube-config');

        // Register Blade components with flat namespace
        // UI Components
        Blade::component('cube::button', \Nasirkhan\LaravelCube\View\Components\Ui\Button::class);
        Blade::component('cube::button-link', \Nasirkhan\LaravelCube\View\Components\Ui\ButtonLink::class);
        Blade::component('cube::link', \Nasirkhan\LaravelCube\View\Components\Ui\Link::class);
        Blade::component('cube::card', \Nasirkhan\LaravelCube\View\Components\Ui\Card::class);
        Blade::component('cube::badge', \Nasirkhan\LaravelCube\View\Components\Ui\Badge::class);
        Blade::component('cube::modal', \Nasirkhan\LaravelCube\View\Components\Ui\Modal::class);
        Blade::component('cube::footer-credit', \Nasirkhan\LaravelCube\View\Components\Ui\FooterCredit::class);
        Blade::component('cube::footer-license', \Nasirkhan\LaravelCube\View\Components\Ui\FooterLicense::class);

        // Utility Components
        Blade::component('cube::google-analytics', \Nasirkhan\LaravelCube\View\Components\GoogleAnalytics::class);
        Blade::component('cube::application-logo', \Nasirkhan\LaravelCube\View\Components\ApplicationLogo::class);

        // Frontend Components
        Blade::component('cube::header-block', \Nasirkhan\LaravelCube\View\Components\Frontend\HeaderBlock::class);
        Blade::component('cube::auth-header', \Nasirkhan\LaravelCube\View\Components\Frontend\AuthHeader::class);
        Blade::component('cube::auth-session-status', \Nasirkhan\LaravelCube\View\Components\Frontend\AuthSessionStatus::class);
        Blade::component('cube::flash-message', \Nasirkhan\LaravelCube\View\Components\Frontend\FlashMessage::class);
        Blade::component('cube::validation-errors', \Nasirkhan\LaravelCube\View\Components\Frontend\ValidationErrors::class);

        // Form Components
        Blade::component('cube::input', \Nasirkhan\LaravelCube\View\Components\Forms\Input::class);
        Blade::component('cube::label', \Nasirkhan\LaravelCube\View\Components\Forms\Label::class);
        Blade::component('cube::error', \Nasirkhan\LaravelCube\View\Components\Forms\Error::class);
        Blade::component('cube::group', \Nasirkhan\LaravelCube\View\Components\Forms\Group::class);
        Blade::component('cube::checkbox', \Nasirkhan\LaravelCube\View\Components\Forms\Checkbox::class);
        Blade::component('cube::select', \Nasirkhan\LaravelCube\View\Components\Forms\Select::class);
        Blade::component('cube::textarea', \Nasirkhan\LaravelCube\View\Components\Forms\Textarea::class);
        Blade::component('cube::toggle', \Nasirkhan\LaravelCube\View\Components\Forms\Toggle::class);

        Blade::component('cube::nav-link', \Nasirkhan\LaravelCube\View\Components\Navigation\NavLink::class);
        Blade::component('cube::responsive-nav-link', \Nasirkhan\LaravelCube\View\Components\Navigation\ResponsiveNavLink::class);
        Blade::component('cube::dropdown', \Nasirkhan\LaravelCube\View\Components\Navigation\Dropdown::class);
        Blade::component('cube::dropdown-link', \Nasirkhan\LaravelCube\View\Components\Navigation\DropdownLink::class);

        // Register Backend components (Bootstrap-based) - Anonymous components
        // Each component is registered with multiple aliases:
        //   hyphen:    <x-backend-breadcrumbs />
        //   cube::     <x-cube::backend-breadcrumbs />
        //   dot:       <x-backend.breadcrumbs /> (used in module views)
        //   dot nested: <x-backend.buttons.save />, <x-backend.layouts.edit />
        $backendComponents = [
            // view path => [hyphen-alias, ...additional dot aliases]
            'cube::components.backend.breadcrumbs'           => ['backend-breadcrumbs',          'backend.breadcrumbs'],
            'cube::components.backend.breadcrumb-item'       => ['backend-breadcrumb-item',      'backend.breadcrumb-item'],
            'cube::components.backend.section-header'        => ['backend-section-header',       'backend.section-header'],
            'cube::components.backend.section-footer'        => ['backend-section-footer',       'backend.section-footer'],
            'cube::components.backend.section-show-table'    => ['backend-section-show-table',   'backend.section-show-table'],
            'cube::components.backend.page-wrapper'          => ['backend-page-wrapper',         'backend.page-wrapper'],
            'cube::components.backend.sidebar-nav-item'      => ['backend-sidebar-nav-item',     'backend.sidebar-nav-item'],
            'cube::components.backend.dynamic-menu'          => ['backend-dynamic-menu',         'backend.dynamic-menu'],
            'cube::components.backend.dynamic-menu-item'     => ['backend-dynamic-menu-item',    'backend.dynamic-menu-item'],
            'cube::components.backend.fallback-sidebar-menu' => ['backend-fallback-sidebar-menu', 'backend.fallback-sidebar-menu'],
            // Backend Buttons
            'cube::components.backend.buttons.create'      => ['backend-button-create',      'backend.buttons.create'],
            'cube::components.backend.buttons.return-back' => ['backend-button-return-back',  'backend.buttons.return-back'],
            'cube::components.backend.buttons.cancel'      => ['backend-button-cancel',       'backend.buttons.cancel'],
            'cube::components.backend.buttons.save'        => ['backend-button-save',         'backend.buttons.save'],
            'cube::components.backend.buttons.edit'        => ['backend-button-edit',         'backend.buttons.edit'],
            'cube::components.backend.buttons.show'        => ['backend-button-show',         'backend.buttons.show'],
            'cube::components.backend.buttons.list'        => ['backend-button-list',         'backend.buttons.list'],
            'cube::components.backend.buttons.public'      => ['backend-button-public',       'backend.buttons.public'],
            'cube::components.backend.buttons.public-view' => ['backend-button-public-view',  'backend.buttons.public-view'],
            // Backend Includes
            'cube::components.backend.includes.header'         => ['backend-include-header',        'backend.includes.header'],
            'cube::components.backend.includes.footer'         => ['backend-include-footer',        'backend.includes.footer'],
            'cube::components.backend.includes.sidebar'        => ['backend-include-sidebar',       'backend.includes.sidebar'],
            'cube::components.backend.includes.menu-user'      => ['backend-include-menu-user',     'backend.includes.menu-user'],
            'cube::components.backend.includes.menu-language'  => ['backend-include-menu-language', 'backend.includes.menu-language'],
            'cube::components.backend.includes.dashboard-demo' => ['backend-include-dashboard-demo', 'backend.includes.dashboard-demo'],
            // Backend Layouts
            'cube::components.backend.layouts.create' => ['backend-layout-create', 'backend.layouts.create'],
            'cube::components.backend.layouts.edit'   => ['backend-layout-edit',   'backend.layouts.edit'],
            'cube::components.backend.layouts.show'   => ['backend-layout-show',   'backend.layouts.show'],
            'cube::components.backend.layouts.trash'  => ['backend-layout-trash',  'backend.layouts.trash'],
        ];

        foreach ($backendComponents as $view => $aliases) {
            $hyphenAlias = $aliases[0];
            // Register with hyphen notation: <x-backend-breadcrumbs />
            Blade::component($view, $hyphenAlias);
            // Register with cube:: prefix (hyphen): <x-cube::backend-breadcrumbs />
            Blade::component($view, 'cube::'.$hyphenAlias);
            // Register all additional dot-notation aliases
            foreach (array_slice($aliases, 1) as $dotAlias) {
                Blade::component($view, $dotAlias);
            }
        }
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cube.php',
            'cube'
        );
    }
}
