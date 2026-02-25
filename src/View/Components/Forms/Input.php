<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Input extends Component
{
    use CastsBooleans, HasFramework;

    public string $type;
    public bool $disabled;
    public bool $required;
    public string $placeholder;
    public bool $autofocus;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'text',
        bool|string $disabled = false,
        bool|string $required = false,
        string $placeholder = '',
        bool|string $autofocus = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        // Define valid HTML5 input types for security and consistency
        // Only allow these types to prevent XSS and ensure proper browser behavior
        $validTypes = ['text', 'email', 'password', 'number', 'tel', 'url', 'search', 'date', 'time', 'datetime-local', 'color'];
        
        // Validate input type - default to 'text' if invalid type provided
        // This prevents invalid HTML attributes and ensures fallback to safe default
        $this->type = in_array($type, $validTypes) ? $type : 'text';
        
        // Convert string/bool to strict boolean using filter_var
        // Handles 'true'/'false' strings, '1'/'0', and actual boolean values
        $this->disabled = $this->castBool($disabled);
        $this->required = $this->castBool($required);
        $this->placeholder = $placeholder;
        $this->autofocus = $this->castBool($autofocus);
    }

    /**
     * Get the input classes based on framework.
     */
    public function getClasses(): string
    {
        // Bootstrap and Tailwind have different class structures
        // Bootstrap uses the 'form-control' class for styled inputs
        // Tailwind uses utility classes defined in config
        return match (true) {
            $this->isBootstrap() => config('cube.bootstrap.forms.input', 'form-control'),
            default => config('cube.tailwind.forms.input'),
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.input'));
    }
}
