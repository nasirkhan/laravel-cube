<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Button extends Component
{
    use CastsBooleans, HasFramework;

    public string $type;
    public string $variant;
    public bool $disabled;
    public bool $loading;
    public string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'button',
        string $variant = 'primary',
        bool|string $disabled = false,
        bool|string $loading = false,
        string $size = 'md',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        // Define valid HTML button types for security and proper behavior
        $validTypes = ['submit', 'button', 'reset'];
        $this->type = in_array($type, $validTypes) ? $type : 'button';

        // Define valid button style variants for visual consistency
        $validVariants = ['primary', 'secondary', 'danger', 'success', 'warning', 'info', 'light', 'dark', 'link'];
        $this->variant = in_array($variant, $validVariants) ? $variant : 'primary';

        // Define valid button sizes for consistent sizing
        $validSizes = ['sm', 'md', 'lg'];
        $this->size = in_array($size, $validSizes) ? $size : 'md';

        // Convert string/bool to strict boolean using filter_var
        // Handles 'true'/'false' strings, '1'/'0', and actual boolean values
        $this->disabled = $this->castBool($disabled);
        $this->loading = $this->castBool($loading);
    }

    /**
     * Get the button classes based on framework.
     */
    public function getClasses(): string
    {
        return match (true) {
            $this->isBootstrap() => $this->getBootstrapClasses(),
            default => $this->getTailwindClasses(),
        };
    }

    /**
     * Get Bootstrap button classes.
     */
    protected function getBootstrapClasses(): string
    {
        // Bootstrap uses 'btn' base class with variant modifiers
        // Classes are configurable via config for customization
        $classes = config("cube.bootstrap.buttons.{$this->variant}", 'btn btn-primary');
        
        // Add size modifier classes for Bootstrap using match expression
        // 'md' is the default size and doesn't need a class
        $sizeClass = match ($this->size) {
            'sm' => ' btn-sm',
            'lg' => ' btn-lg',
            default => '',
        };
        
        return $classes . $sizeClass;
    }

    /**
     * Get Tailwind button classes.
     */
    protected function getTailwindClasses(): string
    {
        // Tailwind classes are fully defined in config
        // Size and variant are combined into a single class string
        return config("cube.tailwind.buttons.{$this->variant}", config('cube.tailwind.buttons.primary'));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('ui.button'));
    }
}
