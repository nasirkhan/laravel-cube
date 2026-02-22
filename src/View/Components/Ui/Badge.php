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

    /**
     * Create a new component instance.
     *
     * @param string $url The URL the badge links to (optional)
     * @param string $text The text content of the badge
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        string $url = '',
        string $text = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->url = $url;
        $this->text = $text;
    }

    /**
     * Determine if the URL is internal to the application.
     *
     * @return bool True if the URL is internal, false otherwise
     */
    public function isInternalUrl(): bool
    {
        if (!$this->url) {
            return false;
        }

        return !preg_match('/^(https?:|mailto:|tel:|#)/', $this->url);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('ui.badge'));
    }
}
