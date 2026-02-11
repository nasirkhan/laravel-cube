<?php

namespace Nasirkhan\LaravelCube;

use Illuminate\Support\ServiceProvider;

class CubeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cube');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/cube'),
        ], 'cube-views');

        $this->publishes([
            __DIR__ . '/../config/cube.php' => config_path('cube.php'),
        ], 'cube-config');

        // Register Blade components with flat namespace
        \Illuminate\Support\Facades\Blade::component('cube::button', \Nasirkhan\LaravelCube\View\Components\Ui\Button::class);
        \Illuminate\Support\Facades\Blade::component('cube::modal', \Nasirkhan\LaravelCube\View\Components\Ui\Modal::class);
        
        \Illuminate\Support\Facades\Blade::component('cube::input', \Nasirkhan\LaravelCube\View\Components\Forms\Input::class);
        \Illuminate\Support\Facades\Blade::component('cube::label', \Nasirkhan\LaravelCube\View\Components\Forms\Label::class);
        \Illuminate\Support\Facades\Blade::component('cube::error', \Nasirkhan\LaravelCube\View\Components\Forms\Error::class);
        \Illuminate\Support\Facades\Blade::component('cube::group', \Nasirkhan\LaravelCube\View\Components\Forms\Group::class);
        \Illuminate\Support\Facades\Blade::component('cube::checkbox', \Nasirkhan\LaravelCube\View\Components\Forms\Checkbox::class);
        \Illuminate\Support\Facades\Blade::component('cube::select', \Nasirkhan\LaravelCube\View\Components\Forms\Select::class);
        \Illuminate\Support\Facades\Blade::component('cube::textarea', \Nasirkhan\LaravelCube\View\Components\Forms\Textarea::class);
        \Illuminate\Support\Facades\Blade::component('cube::toggle', \Nasirkhan\LaravelCube\View\Components\Forms\Toggle::class);
        
        \Illuminate\Support\Facades\Blade::component('cube::nav-link', \Nasirkhan\LaravelCube\View\Components\Navigation\NavLink::class);
        \Illuminate\Support\Facades\Blade::component('cube::responsive-nav-link', \Nasirkhan\LaravelCube\View\Components\Navigation\ResponsiveNavLink::class);
        \Illuminate\Support\Facades\Blade::component('cube::dropdown', \Nasirkhan\LaravelCube\View\Components\Navigation\Dropdown::class);
        \Illuminate\Support\Facades\Blade::component('cube::dropdown-link', \Nasirkhan\LaravelCube\View\Components\Navigation\DropdownLink::class);
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/cube.php',
            'cube'
        );
    }
}
