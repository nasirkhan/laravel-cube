<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Group extends Component
{
    use CastsBooleans;
    use HasFramework;

    public bool $required;

    /**
     * Create a new component instance.
     *
     * @param string      $label     The label text for the form group
     * @param string      $name      The name attribute for the form field
     * @param bool|string $required  Whether the field is required
     * @param string      $help      Help text to display below the field
     * @param mixed       $error     Error message or validation error object
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $label = '',
        public string $name = '',
        bool|string $required = false,
        public string $help = '',
        public mixed $error = null,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        // Convert string/bool to strict boolean using filter_var
        // This handles cases where 'true'/'false' strings or boolean values are passed
        // FILTER_VALIDATE_BOOLEAN returns true for '1', 'true', 'on', 'yes' and false otherwise
        $this->required = $this->castBool($required);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('forms.group'));
    }
}
