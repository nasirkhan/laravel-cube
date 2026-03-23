<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class ValidationErrors extends Component
{
    use HasFramework;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $framework = null)
    {
        $this->initializeFramework($framework);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('frontend.validation-errors'));
    }
}
