<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class FileInput extends Component
{
    use CastsBooleans;
    use HasFramework;

    public bool $multiple;
    public bool $disabled;
    public bool $required;

    public function __construct(
        bool|string $multiple = false,
        bool|string $disabled = false,
        bool|string $required = false,
        public string $accept = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->multiple = $this->castBool($multiple);
        $this->disabled = $this->castBool($disabled);
        $this->required = $this->castBool($required);
    }

    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('forms.file-input'));
    }
}
