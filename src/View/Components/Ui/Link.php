<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Link extends Component
{
    use HasFramework;

    /**
     * Create a new component instance.
     *
     * @param string      $href      The URL the link points to
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $href = '',
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
        return $this->renderSafely($this->getFrameworkView('ui.link'));
    }
}
