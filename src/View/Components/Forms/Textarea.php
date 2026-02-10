<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Textarea extends Component
{
    use HasFramework;

    public bool $disabled;
    public bool $required;
    public string $placeholder;
    public int $rows;

    public function __construct(
        bool|string $disabled = false,
        bool|string $required = false,
        string $placeholder = '',
        int $rows = 3,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
        $this->placeholder = $placeholder;
        $this->rows = $rows;
    }

    public function render(): View
    {
        return view($this->getFrameworkView('forms.textarea'));
    }
}
