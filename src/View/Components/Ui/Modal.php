<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Modal extends Component
{
    use HasFramework;

    public bool $show;
    public string $maxWidth;
    public bool $focusable;
    public string $maxWidthClass;

    /**
     * Create a new component instance.
     *
     * @param string      $name      The unique identifier for the modal
     * @param bool|string $show      Whether the modal is visible by default
     * @param string      $maxWidth  The maximum width of the modal (sm|md|lg|xl|2xl|3xl|4xl|5xl)
     * @param bool|string $focusable Whether the modal can receive focus
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        public string $name,
        bool|string $show = false,
        string $maxWidth = '2xl',
        bool|string $focusable = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        // Define valid modal width options (Tailwind max-width scale)
        // These correspond to Tailwind's max-w-* utility classes
        $validWidths = ['sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl'];

        // Validate width parameter - default to '2xl' if invalid
        // This prevents invalid CSS classes and ensures consistent behavior
        $this->maxWidth = in_array($maxWidth, $validWidths) ? $maxWidth : '2xl';

        // Map width keys to Tailwind max-width classes using match expression
        // sm:max-w-* ensures modal is responsive (full width on mobile, max width on larger screens)
        // Each size corresponds to a specific max-width in rem units
        $this->maxWidthClass = match ($this->maxWidth) {
            'sm'  => 'sm:max-w-sm',
            'md'  => 'sm:max-w-md',
            'lg'  => 'sm:max-w-lg',
            'xl'  => 'sm:max-w-xl',
            '2xl' => 'sm:max-w-2xl',
            '3xl' => 'sm:max-w-3xl',
            '4xl' => 'sm:max-w-4xl',
            '5xl' => 'sm:max-w-5xl',
        };

        // Convert string/bool to strict boolean using filter_var
        // Handles 'true'/'false' strings, '1'/'0', and actual boolean values
        $this->show = filter_var($show, FILTER_VALIDATE_BOOLEAN);
        $this->focusable = filter_var($focusable, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('ui.modal'));
    }
}
