<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class FooterLicense extends HasFramework
{
    public string $license;
    public string $author;
    public string $authorUrl;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $author,
        string $authorUrl,
        string $license = ''
    ) {
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
