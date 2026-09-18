<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;

class TomSelect extends Component
{
    use CastsBooleans;

    public bool $multiple;
    public bool $required;
    public bool $disabled;

    public function __construct(
        bool|string $multiple = false,
        bool|string $required = false,
        bool|string $disabled = false,
    ) {
        $this->multiple = $this->castBool($multiple);
        $this->required = $this->castBool($required);
        $this->disabled = $this->castBool($disabled);
    }

    public function render(): View
    {
        return view('cube::components.forms.tom-select');
    }
}
