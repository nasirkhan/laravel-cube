<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Dropdown extends Component
{
    use HasFramework;

    public string $align;
    public string $width;
    public string $contentClasses;

    /**
     * Create a new component instance.
     *
     * @param string $align The alignment of the dropdown (left|right|top)
     * @param string $width The width of the dropdown (48|56|64)
     * @param string $contentClasses Additional CSS classes for the dropdown content
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        string $align = 'right',
        string $width = '48',
        string $contentClasses = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->align = $align;
        $this->width = $width;
        
        // Set default content classes based on framework if not provided
        if (empty($contentClasses)) {
            $this->contentClasses = $this->isBootstrap() 
                ? 'bg-white py-1' 
                : 'bg-white py-1 dark:bg-gray-700';
        } else {
            $this->contentClasses = $contentClasses;
        }
    }

    /**
     * Get the alignment classes based on framework.
     *
     * @return string The CSS classes for dropdown alignment
     */
    public function getAlignmentClasses(): string
    {
        if ($this->isBootstrap()) {
            return match ($this->align) {
                'left' => 'dropdown-menu-start',
                'right' => 'dropdown-menu-end',
                default => 'dropdown-menu-end',
            };
        }

        // Tailwind classes
        return match ($this->align) {
            'left' => 'start-0 ltr:origin-top-left rtl:origin-top-right',
            'top' => 'origin-top',
            'right' => 'end-0 ltr:origin-top-right rtl:origin-top-left',
            default => 'end-0 ltr:origin-top-right rtl:origin-top-left',
        };
    }

    /**
     * Get the width classes based on framework.
     *
     * @return string The CSS classes for dropdown width
     */
    public function getWidthClasses(): string
    {
        if ($this->isBootstrap()) {
            return ''; // Bootstrap handles width differently
        }

        // Tailwind classes
        return match ($this->width) {
            '48' => 'w-48',
            '56' => 'w-56',
            '64' => 'w-64',
            default => 'w-48',
        };
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view($this->getFrameworkView('navigation.dropdown'));
    }
}
