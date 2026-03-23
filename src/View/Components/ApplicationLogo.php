<?php

namespace Nasirkhan\LaravelCube\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ApplicationLogo extends Component
{
    use RendersWithFallback;

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return $this->renderSafely('cube::components.application-logo');
    }
}
