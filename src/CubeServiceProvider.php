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

        // Register Blade component namespace
        $this->loadViewComponentsAs('cube', [
            // UI Components
            \Nasirkhan\LaravelCube\View\Components\Ui\Modal::class,
            \Nasirkhan\LaravelCube\View\Components\Ui\Button::class,

            // Form Components
            \Nasirkhan\LaravelCube\View\Components\Forms\Input::class,
            \Nasirkhan\LaravelCube\View\Components\Forms\Label::class,
            \Nasirkhan\LaravelCube\View\Components\Forms\Error::class,
            \Nasirkhan\LaravelCube\View\Components\Forms\Group::class,
            \Nasirkhan\LaravelCube\View\Components\Forms\Checkbox::class,
            \Nasirkhan\LaravelCube\View\Components\Forms\Select::class,
            \Nasirkhan\LaravelCube\View\Components\Forms\Textarea::class,
            \Nasirkhan\LaravelCube\View\Components\Forms\Toggle::class,

            // Navigation Components
            \Nasirkhan\LaravelCube\View\Components\Navigation\NavLink::class,
            \Nasirkhan\LaravelCube\View\Components\Navigation\ResponsiveNavLink::class,
        ]);
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
