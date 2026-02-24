<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Select extends Component
{
    use CastsBooleans, HasFramework;

    public bool $disabled;
    public bool $required;
    public bool $autofocus;

    /**
     * Create a new component instance.
     *
     * @param bool|string $disabled Whether the select is disabled
     * @param bool|string $required Whether the select is required
     * @param bool|string $autofocus Whether the select should be focused on page load
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        bool|string $disabled = false,
        bool|string $required = false,
        bool|string $autofocus = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        
        // Convert string/bool to strict boolean using filter_var
        // Handles 'true'/'false' strings, '1'/'0', and actual boolean values
        $this->disabled = $this->castBool($disabled);
        $this->required = $this->castBool($required);
        $this->autofocus = $this->castBool($autofocus);
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
