<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Link extends Component
{
    use HasFramework;

    public string $href;

    public function __construct(
        string $href = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->href = $href;
    }

    public function render(): View
    {
        return view($this->getFrameworkView('ui.link'));
    }
}
