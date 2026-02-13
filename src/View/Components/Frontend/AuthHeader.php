<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;

class AuthHeader extends Component
{
    public string $title;
    public string $description;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title = '',
        string $description = ''
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('cube::components.frontend.auth-header');
    }
}
