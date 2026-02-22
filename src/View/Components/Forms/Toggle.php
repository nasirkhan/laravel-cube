<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Toggle extends Component
{
    use HasFramework;

    public bool $disabled;
    public bool $checked;

    /**
     * Create a new component instance.
     *
     * @param bool|string $disabled Whether the toggle is disabled
     * @param bool|string $checked Whether the toggle is checked by default
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        bool|string $disabled = false,
        bool|string $checked = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->checked = filter_var($checked, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.toggle'));
    }
}
