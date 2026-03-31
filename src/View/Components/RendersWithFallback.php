<?php

namespace Nasirkhan\LaravelCube\View\Components;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

/**
 * Provides safe view rendering with a fallback error boundary.
 *
 * Components using this trait should call renderSafely() instead of
 * view() directly. If the view fails to render for any reason, a
 * graceful fallback is shown and the error is logged.
 */
trait RendersWithFallback
{
    /**
     * Render the given view, falling back to an error boundary on failure.
     */
    protected function renderSafely(string $view): View
    {
        try {
            return view($view);
        } catch (\Throwable $e) {
            Log::error('Cube component failed to render.', [
                'component' => static::class,
                'view'      => $view,
                'message'   => $e->getMessage(),
            ]);

            try {
                return view('cube::components.error-boundary');
            } catch (\Throwable) {
                return view()->file(__DIR__.'/../../../resources/views/components/error-boundary.blade.php');
            }
        }
    }
}
