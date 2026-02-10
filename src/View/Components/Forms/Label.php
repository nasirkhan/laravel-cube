<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Label extends Component
{
    use HasFramework;

    public string $for;
    public string $value;
    public bool $required;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $for = '',
        string $value = '',
        bool|string $required = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->for = $for;
        $this->value = $value;
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.label'));
    }
}
