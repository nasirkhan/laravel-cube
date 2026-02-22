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

    /**
     * Create a new component instance.
     *
     * @param bool|string $disabled Whether the textarea is disabled
     * @param bool|string $required Whether the textarea is required
     * @param string $placeholder The placeholder text
     * @param int $rows The number of visible text lines
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.textarea'));
    }
}
