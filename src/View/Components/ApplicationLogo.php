<?php

namespace Nasirkhan\LaravelCube\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ApplicationLogo extends Component
{
    public function render(): View
    {
        return view('cube::components.application-logo');
    }
}
