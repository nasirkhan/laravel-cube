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
        // Use provided framework or fall back to config default (tailwind)
        // This allows components to be framework-agnostic
        $this->framework = $framework ?? config('cube.default_framework', 'tailwind');
        
        // Validate framework - only allow 'tailwind' or 'bootstrap'
        // If invalid framework is provided, default to 'tailwind' for safety
        $this->framework = match (true) {
            in_array($this->framework, ['tailwind', 'bootstrap']) => $this->framework,
            default => 'tailwind',
        };
    }

    /**
     * Get the view path based on the framework.
     */
    protected function getFrameworkView(string $baseView): string
    {
        // Construct view path: cube::components.{category}.{component}.{framework}
        // Example: cube::components.forms.input.tailwind
        // This allows the same component to have different views for different CSS frameworks
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
