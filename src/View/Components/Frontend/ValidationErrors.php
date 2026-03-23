<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\RendersWithFallback;

class ValidationErrors extends Component
{
    use RendersWithFallback;

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return $this->renderSafely('cube::components.frontend.validation-errors');
    }
}
