<?php

namespace Nasirkhan\LaravelCube;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Head\Enums\OgType;
use Laravel\Head\Enums\TwitterCard;
use Laravel\Head\Facades\Head;
use Laravel\Head\HeadBuilder;
use Nasirkhan\LaravelCube\View\Components\ApplicationLogo;
use Nasirkhan\LaravelCube\View\Components\Forms\TomSelect;
use Nasirkhan\LaravelCube\View\Components\Frontend\ShareButtons;
use Nasirkhan\LaravelCube\View\Components\GoogleAnalytics;
use Nasirkhan\LaravelCube\View\Components\Ui\Icon;

class CubeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cube');
        $this->bootHeadDefaults();

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/cube'),
        ], 'cube-views');

        $this->publishes([
            __DIR__.'/../config/cube.php' => config_path('cube.php'),
        ], 'cube-config');

        $this->publishes([
            __DIR__.'/../resources/css/tailwind.css' => resource_path('css/vendor/cube/tailwind.css'),
        ], 'cube-css');

        // UI Components (anonymous)
        Blade::component('cube::components.ui.alert', 'cube::alert');
        Blade::component('cube::components.ui.button', 'cube::button');
        Blade::component('cube::components.ui.button-link', 'cube::button-link');
        Blade::component('cube::components.ui.link', 'cube::link');
        Blade::component('cube::components.ui.card', 'cube::card');
        Blade::component('cube::components.ui.badge', 'cube::badge');
        Blade::component('cube::components.ui.modal', 'cube::modal');
        Blade::component('cube::components.ui.footer-credit', 'cube::footer-credit');
        Blade::component('cube::components.ui.footer-license', 'cube::footer-license');

        // UI Components (class-based — contain dynamic per-request logic)
        Blade::component('cube::icon', Icon::class);

        // Utility Components (class-based)
        Blade::component('cube::google-analytics', GoogleAnalytics::class);
        Blade::component('cube::application-logo', ApplicationLogo::class);

        // Frontend Components
        Blade::component('cube::components.frontend.auth-header', 'cube::auth-header');
        Blade::component('cube::components.frontend.auth-session-status', 'cube::auth-session-status');
        Blade::component('cube::components.frontend.flash-message', 'cube::flash-message');
        Blade::component('cube::components.frontend.validation-errors', 'cube::validation-errors');
        Blade::component('cube::components.frontend.header-block', 'cube::header-block');
        Blade::component('cube::share-buttons', ShareButtons::class);

        // Form Components (anonymous)
        Blade::component('cube::components.forms.input', 'cube::input');
        Blade::component('cube::components.forms.label', 'cube::label');
        Blade::component('cube::components.forms.error', 'cube::error');
        Blade::component('cube::components.forms.group', 'cube::group');
        Blade::component('cube::components.forms.checkbox', 'cube::checkbox');
        Blade::component('cube::components.forms.select', 'cube::select');
        Blade::component('cube::components.forms.textarea', 'cube::textarea');
        Blade::component('cube::components.forms.toggle', 'cube::toggle');
        Blade::component('cube::components.forms.file-input', 'cube::file-input');

        // Form Components (class-based — contain dynamic logic)
        Blade::component('cube::tom-select', TomSelect::class);

        Blade::component('cube::components.lw-table', 'lw-table');
        Blade::component('cube::components.lw-table', 'cube::lw-table');
        Blade::component('cube::components.lw-table-th', 'lw-table-th');
        Blade::component('cube::components.lw-table-th', 'cube::lw-table-th');

        // Navigation Components (anonymous)
        Blade::component('cube::components.navigation.nav-link', 'cube::nav-link');
        Blade::component('cube::components.navigation.responsive-nav-link', 'cube::responsive-nav-link');
        Blade::component('cube::components.navigation.dropdown', 'cube::dropdown');
        Blade::component('cube::components.navigation.dropdown-link', 'cube::dropdown-link');

        $backendComponents = [
            'cube::components.backend.breadcrumbs'             => 'backend-breadcrumbs',
            'cube::components.backend.breadcrumb-item'         => 'backend-breadcrumb-item',
            'cube::components.backend.section-header'          => 'backend-section-header',
            'cube::components.backend.section-footer'          => 'backend-section-footer',
            'cube::components.backend.section-show-table'      => 'backend-section-show-table',
            'cube::components.backend.page-wrapper'            => 'backend-page-wrapper',
            'cube::components.backend.sidebar-nav-item'        => 'backend-sidebar-nav-item',
            'cube::components.backend.dynamic-menu'            => 'backend-dynamic-menu',
            'cube::components.backend.dynamic-menu-item'       => 'backend-dynamic-menu-item',
            'cube::components.backend.fallback-sidebar-menu'   => 'backend-fallback-sidebar-menu',
            'cube::components.backend.buttons.create'          => 'backend-button-create',
            'cube::components.backend.buttons.return-back'     => 'backend-button-return-back',
            'cube::components.backend.buttons.cancel'          => 'backend-button-cancel',
            'cube::components.backend.buttons.save'            => 'backend-button-save',
            'cube::components.backend.buttons.edit'            => 'backend-button-edit',
            'cube::components.backend.buttons.show'            => 'backend-button-show',
            'cube::components.backend.buttons.list'            => 'backend-button-list',
            'cube::components.backend.buttons.public'          => 'backend-button-public',
            'cube::components.backend.buttons.public-view'     => 'backend-button-public-view',
            'cube::components.backend.includes.header'         => 'backend-include-header',
            'cube::components.backend.includes.footer'         => 'backend-include-footer',
            'cube::components.backend.includes.sidebar'        => 'backend-include-sidebar',
            'cube::components.backend.includes.menu-user'      => 'backend-include-menu-user',
            'cube::components.backend.includes.menu-language'  => 'backend-include-menu-language',
            'cube::components.backend.includes.dashboard-demo' => 'backend-include-dashboard-demo',
            'cube::components.backend.layouts.create'          => 'backend-layout-create',
            'cube::components.backend.layouts.edit'            => 'backend-layout-edit',
            'cube::components.backend.layouts.show'            => 'backend-layout-show',
            'cube::components.backend.layouts.trash'           => 'backend-layout-trash',
        ];

        foreach ($backendComponents as $view => $alias) {
            Blade::component($view, $alias);
            Blade::component($view, 'cube::'.$alias);
        }
    }

    /**
     * Register site-wide head defaults from application settings.
     *
     * Uses the setting() helper from nasirkhan/module-manager when available,
     * so the package degrades gracefully without that dependency.
     *
     * Head::defaults() executes its callback synchronously at registration time,
     * which means any DB calls inside would run during service provider boot —
     * before migrations exist. We defer the registration to the first view render
     * so setting() is only called during actual request handling.
     */
    protected function bootHeadDefaults(): void
    {
        $registered = false;

        view()->composer('*', function () use (&$registered) {
            if ($registered) {
                return;
            }
            $registered = true;

            Head::defaults(function (HeadBuilder $head) {
                $s = fn (string $key, mixed $default = null): mixed => function_exists('setting')
                    ? (\setting($key) ?? $default)
                    : $default;

                $head
                    ->description((string) $s('meta_description', ''))
                    ->og(
                        siteName: (string) $s('meta_site_name', config('app.name')),
                        type: OgType::Website,
                        url: request()->fullUrl(),
                    )
                    ->twitter(
                        card: TwitterCard::SummaryWithLargeImage,
                        site: ($twitterSite = $s('meta_twitter_site')) ? (string) $twitterSite : null,
                        creator: ($twitterCreator = $s('meta_twitter_creator')) ? (string) $twitterCreator : null,
                    )
                    ->canonical()
                    ->searchableByRobots()
                    ->viewport('width=device-width, initial-scale=1, shrink-to-fit=no');

                if ($keyword = $s('meta_keyword')) {
                    $head->meta('keywords', (string) $keyword);
                }

                if ($image = $s('meta_image')) {
                    $head->ogImage(asset((string) $image), width: 1200, height: 630);
                }

                if ($fbAppId = $s('meta_fb_app_id')) {
                    $head->meta('fb:app_id', (string) $fbAppId);
                }

                $head->favicon(asset('img/favicon.png'));
            });
        });
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
