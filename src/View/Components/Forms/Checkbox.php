<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Checkbox extends Component
{
    use HasFramework;

    public bool $disabled;
    public bool $required;
    public bool $checked;
    public bool $autofocus;

    /**
     * Create a new component instance.
     *
     * @param bool|string $disabled Whether the checkbox is disabled
     * @param bool|string $required Whether the checkbox is required
     * @param bool|string $checked Whether the checkbox is checked by default
     * @param bool|string $autofocus Whether the checkbox should be focused on page load
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        bool|string $disabled = false,
        bool|string $required = false,
        bool|string $checked = false,
        bool|string $autofocus = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        
        // Convert string/bool to strict boolean using filter_var
        // Handles 'true'/'false' strings, '1'/'0', and actual boolean values
        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
        $this->checked = filter_var($checked, FILTER_VALIDATE_BOOLEAN);
        $this->autofocus = filter_var($autofocus, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.checkbox'));
    }
}
