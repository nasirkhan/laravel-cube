<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Select extends Component
{
    use HasFramework;

    public bool $disabled;
    public bool $required;

    public function __construct(
        bool|string $disabled = false,
        bool|string $required = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
    }

    public function render(): View
    {
        return view($this->getFrameworkView('forms.select'));
    }
}
