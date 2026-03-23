<?php

namespace Nasirkhan\LaravelCube\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GoogleAnalytics extends Component
{
    use RendersWithFallback;

    public ?string $trackingId;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $trackingId = null)
    {
        $this->trackingId = $trackingId ?? (function_exists('setting') ? setting('google_analytics') : null);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return $this->renderSafely('cube::components.google-analytics');
    }
}
