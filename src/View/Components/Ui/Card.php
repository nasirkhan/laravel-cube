<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Card extends Component
{
    use HasFramework;

    /**
     * Create a new component instance.
     *
     * @param string|null $url       The URL the card links to (optional)
     * @param string      $name      The name/title of the card
     * @param string      $image     The image path for the card
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public ?string $url = null,
        public string $name = '',
        public string $image = '',
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

        return !preg_match('/^(https?:|mailto:|tel:|#)/', $this->url);
    }

    /**
     * Get the full URL for the card image.
     *
     * @return string|null The full image URL or null if no image is set
     */
    public function getImage(): ?string
    {
        return $this->image ? asset($this->image) : null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('ui.card'));
    }
}
