<?php

namespace Nasirkhan\LaravelCube\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ApplicationLogo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('cube::components.application-logo');
    }
}
