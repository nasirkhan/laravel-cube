<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class FooterCredit extends HasFramework
{
    public string $text;

    /**
     * Create a new component instance.
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('ui.footer-credit'));
    }
}
