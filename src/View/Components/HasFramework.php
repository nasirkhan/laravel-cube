<?php

namespace Nasirkhan\LaravelCube\View\Components;

trait HasFramework
{
    public string $framework;

    /**
     * Initialize the framework for the component.
     */
    protected function initializeFramework(?string $framework = null): void
    {
        $this->framework = $framework ?? config('cube.default_framework', 'tailwind');
        
        // Validate framework
        if (!in_array($this->framework, ['tailwind', 'bootstrap'])) {
            $this->framework = 'tailwind';
        }
    }

    /**
     * Get the view path based on the framework.
     */
    protected function getFrameworkView(string $baseView): string
    {
        return "cube::components.{$baseView}.{$this->framework}";
    }

    /**
     * Check if using Tailwind framework.
     */
    protected function isTailwind(): bool
    {
        return $this->framework === 'tailwind';
    }

    /**
     * Check if using Bootstrap framework.
     */
    protected function isBootstrap(): bool
    {
        return $this->framework === 'bootstrap';
    }
}
