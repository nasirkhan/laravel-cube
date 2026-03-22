<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;

class ValidationErrors extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('cube::components.frontend.validation-errors');
    }
}
