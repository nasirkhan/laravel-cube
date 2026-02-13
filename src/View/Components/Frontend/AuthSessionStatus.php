<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;

class AuthSessionStatus extends Component
{
    public ?string $status;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $status = null)
    {
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('cube::components.frontend.auth-session-status');
    }
}
