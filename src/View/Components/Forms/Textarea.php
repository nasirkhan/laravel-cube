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
    public bool $autofocus;

    /**
     * Create a new component instance.
     *
     * @param bool|string $disabled Whether the textarea is disabled
     * @param bool|string $required Whether the textarea is required
     * @param string $placeholder The placeholder text
     * @param int $rows The number of visible text lines
     * @param bool|string $autofocus Whether the textarea should be focused on page load
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        bool|string $disabled = false,
        bool|string $required = false,
        public string $placeholder = '',
        public int $rows = 3,
        bool|string $autofocus = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
        $this->autofocus = filter_var($autofocus, FILTER_VALIDATE_BOOLEAN);
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
