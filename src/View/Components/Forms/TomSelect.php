<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class TomSelect extends Component
{
    public function __construct(
        public bool $multiple = false,
        public bool $required = false,
        public bool $disabled = false,
    ) {
    }

    public function render(): View
    {
        return view('cube::components.forms.tom-select');
    }
}
