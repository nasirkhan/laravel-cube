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

    /**
     * Create a new component instance.
     *
     * @param bool|string $disabled Whether the select is disabled
     * @param bool|string $required Whether the select is required
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        bool|string $disabled = false,
        bool|string $required = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.select'));
    }
}
