<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\RendersWithFallback;

class AuthHeader extends Component
{
    use RendersWithFallback;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public string $description = ''
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return $this->renderSafely('cube::components.frontend.auth-header');
    }
}
