<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;

class Icon extends Component
{
    public string $name;

    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $variant = 'outline')
    {
        $this->name = $this->sanitizeName($name);
        $this->variant = in_array($variant, ['outline', 'solid'], true) ? $variant : 'outline';
    }

    /**
     * Get the Flowbite Blade component alias.
     */
    public function iconComponentAlias(): string
    {
        $prefix = $this->variant === 'solid' ? 'fwb-s-' : 'fwb-o-';

        return $prefix.$this->name;
    }

    /**
     * Get default icon classes inspired by Flux icon sizing.
     */
    public function defaultClasses(): string
    {
        return match ($this->variant) {
            'solid' => 'shrink-0 size-6',
            default => 'shrink-0 size-6',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('cube::components.ui.icon');
    }

    protected function sanitizeName(string $name): string
    {
        $normalized = strtolower(trim($name));
        $normalized = preg_replace('/[^a-z0-9-]+/', '-', $normalized) ?? '';

        return trim($normalized, '-');
    }
}
