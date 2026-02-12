<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Card extends Component
{
    use HasFramework;

    public ?string $url;
    public string $name;
    public string $image;

    public function __construct(
        ?string $url = null,
        string $name = '',
        string $image = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->url = $url;
        $this->name = $name;
        $this->image = $image;
    }

    public function isInternalUrl(): bool
    {
        if (!$this->url) {
            return false;
        }

        return !preg_match('/^(https?:|mailto:|tel:|#)/', $this->url);
    }

    public function getImage(): ?string
    {
        return $this->image ? asset($this->image) : null;
    }

    public function render(): View
    {
        return view($this->getFrameworkView('ui.card'));
    }
}
