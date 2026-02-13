<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class FooterLicense extends Component
{
    use HasFramework;

    public string $license;
    public ?string $author;
    public ?string $authorUrl;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $author = null,
        ?string $authorUrl = null,
        string $license = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        
        $this->license = $license;
        $this->author = $author;
        $this->authorUrl = $authorUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('ui.footer-license'));
    }
}
