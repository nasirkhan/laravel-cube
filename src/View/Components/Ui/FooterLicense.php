<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class FooterLicense extends Component
{
    use HasFramework;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $author = null,
        public ?string $authorUrl = null,
        public string $license = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('ui.footer-license'));
    }
}
