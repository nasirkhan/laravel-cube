<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Badge extends Component
{
    use HasFramework;

    /**
     * Create a new component instance.
     *
     * @param string $url The URL the badge links to (optional)
     * @param string $text The text content of the badge
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $url = '',
        public string $text = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
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

        // Check if URL starts with external protocols or anchors
        // - https?: External HTTP/HTTPS links
        // - mailto: Email links
        // - tel: Phone number links
        // - #: Anchor links to same page
        // If none of these patterns match, the URL is considered internal
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
