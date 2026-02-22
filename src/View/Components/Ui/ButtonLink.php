<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class ButtonLink extends Component
{
    use HasFramework;

    /**
     * Create a new component instance.
     *
     * @param string $href The URL the button link points to
     * @param string $variant The visual variant of the button (primary|secondary|danger|success|warning|info|light|dark|link)
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $href = '#',
        public string $variant = 'primary',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('ui.button-link'));
    }
}
