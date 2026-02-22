<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Group extends Component
{
    use HasFramework;

    public string $label;
    public string $name;
    public bool $required;
    public string $help;
    public mixed $error;

    /**
     * Create a new component instance.
     *
     * @param string $label The label text for the form group
     * @param string $name The name attribute for the form field
     * @param bool|string $required Whether the field is required
     * @param string $help Help text to display below the field
     * @param mixed $error Error message or validation error object
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        string $label = '',
        string $name = '',
        bool|string $required = false,
        string $help = '',
        mixed $error = null,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->label = $label;
        $this->name = $name;
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
        $this->help = $help;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.group'));
    }
}
