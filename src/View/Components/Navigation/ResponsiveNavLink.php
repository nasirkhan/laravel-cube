<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class ResponsiveNavLink extends Component
{
    use CastsBooleans;
    use HasFramework;

    public bool $active;
    public string $classes;

    /**
     * Create a new component instance.
     *
     * @param string      $href      The URL the link points to
     * @param bool|string $active    Whether the link is currently active
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $href = '#',
        bool|string $active = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        // Convert string/bool to strict boolean using filter_var
        // This handles 'true'/'false' strings, '1'/'0', and actual boolean values
        $this->active = $this->castBool($active);

        // Build CSS classes based on active state and framework
        // This is done in constructor to avoid recalculating on each render
        $this->classes = $this->getClasses();
    }

    protected function getClasses(): string
    {
        return match (true) {
            $this->isBootstrap() => $this->getBootstrapClasses(),
            default              => $this->getTailwindClasses(),
        };
    }

    /**
     * Get Bootstrap responsive navigation link classes.
     */
    protected function getBootstrapClasses(): string
    {
        // Bootstrap uses simple 'nav-link' class with optional 'active' modifier
        $baseClasses = 'nav-link';
        $activeClass = match ($this->active) {
            true  => ' active',
            false => '',
        };

        return $baseClasses.$activeClass;
    }

    /**
     * Get Tailwind responsive navigation link classes.
     */
    protected function getTailwindClasses(): string
    {
        // Tailwind classes with dark mode support and comprehensive state handling
        // Active state: Indigo color scheme with visible left border indicator
        // Inactive state: Gray color scheme with transparent border, changes on hover/focus
        // All states include transition for smooth animations
        return match ($this->active) {
            true  => 'block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 dark:border-indigo-600 text-left text-base font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:outline-hidden focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300 transition duration-150 ease-in-out',
            false => 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-hidden focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out',
        };
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('navigation.responsive-nav-link'));
    }
}
