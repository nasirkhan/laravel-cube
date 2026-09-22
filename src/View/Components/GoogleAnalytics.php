<?php

namespace Nasirkhan\LaravelCube\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GoogleAnalytics extends Component
{
    public ?string $trackingId;

    public function __construct(?string $trackingId = null)
    {
        $this->trackingId = $trackingId ?? (function_exists('setting') ? setting('google_analytics') : null);
    }

    public function render(): View
    {
        return view('cube::components.google-analytics');
    }
}
