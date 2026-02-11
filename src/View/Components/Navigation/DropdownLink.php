<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class DropdownLink extends Component
{
    use HasFramework;

    public function __construct(?string $framework = null)
    {
        $this->initializeFramework($framework);
    }

    public function render(): View
    {
        return view($this->getFrameworkView('navigation.dropdown-link'));
    }
}
