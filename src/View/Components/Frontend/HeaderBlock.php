<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\RendersWithFallback;

class HeaderBlock extends Component
{
    use RendersWithFallback;

    public string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title = '',
        public string $subTitle = '',
        public string $preTitle = ''
    ) {
        $this->title = $title ?: app_name();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return $this->renderSafely('cube::components.frontend.header-block');
    }
}
