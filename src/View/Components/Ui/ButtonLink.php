<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class ButtonLink extends Component
{
    use HasFramework;

    public string $href;
    public string $variant;

    public function __construct(
        string $href = '#',
        string $variant = 'primary',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->href = $href;
        $this->variant = $variant;
    }

    public function render(): View
    {
        return view($this->getFrameworkView('ui.button-link'));
    }
}
