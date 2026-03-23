<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class NavLink extends Component
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
     * Get Bootstrap navigation link classes.
     */
    protected function getBootstrapClasses(): string
    {
        // Bootstrap uses 'nav-link' class with optional 'active' modifier
        // Classes are configurable via config for customization
        $baseClasses = config('cube.bootstrap.navigation.link', 'nav-link');
        $activeClass = match ($this->active) {
            true  => ' '.config('cube.bootstrap.navigation.link_active', 'active'),
            false => '',
        };

        return $baseClasses.$activeClass;
    }

    /**
     * Get Tailwind navigation link classes.
     */
    protected function getTailwindClasses(): string
    {
        // Tailwind classes are split into base and state-specific classes
        // This allows for more granular control over styling
        // Base classes: Common styles for all states
        // State classes: Specific styles for active/inactive states
        $baseClasses = config('cube.tailwind.navigation.link');
        $stateClasses = match ($this->active) {
            true  => config('cube.tailwind.navigation.link_active'),
            false => config('cube.tailwind.navigation.link_inactive'),
        };

        return $baseClasses.' '.$stateClasses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('navigation.nav-link'));
    }
}
