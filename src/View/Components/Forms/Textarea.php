<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Textarea extends Component
{
    use CastsBooleans;
    use HasFramework;

    public bool $disabled;
    public bool $required;
    public bool $autofocus;

    /**
     * Create a new component instance.
     *
     * @param bool|string $disabled    Whether the textarea is disabled
     * @param bool|string $required    Whether the textarea is required
     * @param string      $placeholder The placeholder text
     * @param int         $rows        The number of visible text lines
     * @param bool|string $autofocus   Whether the textarea should be focused on page load
     * @param string|null $framework   The CSS framework to use (tailwind|bootstrap)
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
        return $this->renderSafely($this->getFrameworkView('forms.textarea'));
    }
}
