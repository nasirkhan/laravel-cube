<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Button extends Component
{
    use HasFramework;

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

        $validTypes = ['submit', 'button', 'reset'];
        $this->type = in_array($type, $validTypes) ? $type : 'button';

        $validVariants = ['primary', 'secondary', 'danger', 'success', 'warning', 'info', 'light', 'dark', 'link'];
        $this->variant = in_array($variant, $validVariants) ? $variant : 'primary';

        $validSizes = ['sm', 'md', 'lg'];
        $this->size = in_array($size, $validSizes) ? $size : 'md';

        $this->disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
        $this->loading = filter_var($loading, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get the button classes based on framework.
     */
    public function getClasses(): string
    {
        if ($this->isBootstrap()) {
            $classes = config("cube.bootstrap.buttons.{$this->variant}", 'btn btn-primary');
            
            if ($this->size === 'sm') {
                $classes .= ' btn-sm';
            } elseif ($this->size === 'lg') {
                $classes .= ' btn-lg';
            }
            
            return $classes;
        }

        // Tailwind classes
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
