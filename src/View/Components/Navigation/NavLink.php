<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class NavLink extends Component
{
    use HasFramework;

    public string $href;
    public bool $active;
    public string $classes;

    public function __construct(
        string $href = '#',
        bool|string $active = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->href = $href;
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

    public function render(): View
    {
        return view($this->getFrameworkView('navigation.nav-link'));
    }
}
