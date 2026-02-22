<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class DropdownLink extends Component
{
    use HasFramework;

    /**
     * Create a new component instance.
     *
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(?string $framework = null)
    {
        $this->initializeFramework($framework);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('navigation.dropdown-link'));
    }
}
