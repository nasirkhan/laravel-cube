<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Badge extends Component
{
    use HasFramework;

    public string $url;
    public string $text;

    public function __construct(
        string $url = '',
        string $text = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->url = $url;
        $this->text = $text;
    }

    public function isInternalUrl(): bool
    {
        if (!$this->url) {
            return false;
        }

        return !preg_match('/^(https?:|mailto:|tel:|#)/', $this->url);
    }

    public function render(): View
    {
        return view($this->getFrameworkView('ui.badge'));
    }
}
