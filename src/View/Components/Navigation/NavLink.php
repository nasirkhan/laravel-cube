<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class NavLink extends Component
{
    use HasFramework;

    public bool $active;
    public string $classes;

    /**
     * Create a new component instance.
     *
     * @param string $href The URL the link points to
     * @param bool|string $active Whether the link is currently active
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $href = '#',
        bool|string $active = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->active = filter_var($active, FILTER_VALIDATE_BOOLEAN);
        $this->classes = $this->getClasses();
    }

    protected function getClasses(): string
    {
        if ($this->isBootstrap()) {
            $classes = config('cube.bootstrap.navigation.link', 'nav-link');
            if ($this->active) {
                $classes .= ' ' . config('cube.bootstrap.navigation.link_active', 'active');
            }
            return $classes;
        }

        // Tailwind
        $baseClasses = config('cube.tailwind.navigation.link');
        $stateClasses = $this->active
            ? config('cube.tailwind.navigation.link_active')
            : config('cube.tailwind.navigation.link_inactive');
        
        return $baseClasses . ' ' . $stateClasses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('navigation.nav-link'));
    }
}
