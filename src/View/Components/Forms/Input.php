<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Input extends Component
{
    use HasFramework;

    public string $type;
    public bool $disabled;
    public bool $required;
    public string $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'text',
        bool|string $disabled = false,
        bool|string $required = false,
        string $placeholder = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        $validTypes = ['text', 'email', 'password', 'number', 'tel', 'url', 'search', 'date', 'time', 'datetime-local'];
        $this->type = in_array($type, $validTypes) ? $type : 'text';
        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
        $this->placeholder = $placeholder;
    }

    /**
     * Get the input classes based on framework.
     */
    public function getClasses(): string
    {
        if ($this->isBootstrap()) {
            return config('cube.bootstrap.forms.input', 'form-control');
        }

        return config('cube.tailwind.forms.input');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.input'));
    }
}
