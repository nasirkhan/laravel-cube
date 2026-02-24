<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Label extends Component
{
    use CastsBooleans, HasFramework;

    public bool $required;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $for = '',
        public string $value = '',
        bool|string $required = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->required = $this->castBool($required);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.label'));
    }
}
