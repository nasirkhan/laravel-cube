<?php

namespace Nasirkhan\LaravelCube\View\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Dropdown extends Component
{
    use HasFramework;

    public string $contentClasses;

    /**
     * Create a new component instance.
     *
     * @param string      $align          The alignment of the dropdown (left|right|top)
     * @param string      $width          The width of the dropdown (48|56|64)
     * @param string      $contentClasses Additional CSS classes for the dropdown content
     * @param string|null $framework      The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $align = 'right',
        public string $width = '48',
        string $contentClasses = '',
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        // Set default content classes based on framework if not provided
        // Bootstrap uses simple white background with padding
        // Tailwind adds dark mode support for dark theme compatibility
        $this->contentClasses = match (true) {
            !empty($contentClasses) => $contentClasses,
            $this->isBootstrap()    => 'bg-white py-1',
            default                 => 'bg-white py-1 dark:bg-gray-700',
        };
    }

    /**
     * Get the alignment classes based on framework.
     *
     * @return string The CSS classes for dropdown alignment
     */
    public function getAlignmentClasses(): string
    {
        return match (true) {
            $this->isBootstrap() => match ($this->align) {
                // Bootstrap uses dropdown-menu-start/end classes for alignment
                // These classes position the dropdown menu relative to the trigger
                'left'  => 'dropdown-menu-start',
                'right' => 'dropdown-menu-end',
                default => 'dropdown-menu-end',
            },
            default => match ($this->align) {
                // Tailwind classes with RTL (Right-to-Left) support
                // ltr: prefix applies to left-to-right languages
                // rtl: prefix applies to right-to-left languages (Arabic, Hebrew, etc.)
                // origin-top-* classes control the animation origin point
                'left'  => 'start-0 ltr:origin-top-left rtl:origin-top-right',
                'top'   => 'origin-top',
                'right' => 'end-0 ltr:origin-top-right rtl:origin-top-left',
                default => 'end-0 ltr:origin-top-right rtl:origin-top-left',
            },
        };
    }

    /**
     * Get the width classes based on framework.
     *
     * @return string The CSS classes for dropdown width
     */
    public function getWidthClasses(): string
    {
        return match (true) {
            $this->isBootstrap() => '',
            default              => match ($this->width) {
                // Tailwind width classes using w-{size} pattern
                // Numbers represent rem units: w-48 = 12rem, w-56 = 14rem, w-64 = 16rem
                // These classes set a fixed width for the dropdown content
                '48'    => 'w-48',
                '56'    => 'w-56',
                '64'    => 'w-64',
                default => 'w-48',
            },
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
