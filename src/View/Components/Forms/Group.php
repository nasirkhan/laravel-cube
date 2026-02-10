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

    public function render(): View
    {
        return view($this->getFrameworkView('forms.group'));
    }
}
