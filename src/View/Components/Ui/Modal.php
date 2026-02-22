<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Modal extends Component
{
    use HasFramework;

    public string $name;
    public bool $show;
    public string $maxWidth;
    public bool $focusable;
    public string $maxWidthClass;

    /**
     * Create a new component instance.
     *
     * @param string $name The unique identifier for the modal
     * @param bool|string $show Whether the modal is visible by default
     * @param string $maxWidth The maximum width of the modal (sm|md|lg|xl|2xl|3xl|4xl|5xl)
     * @param bool|string $focusable Whether the modal can receive focus
     * @param string|null $framework The CSS framework to use (tailwind|bootstrap)
     */
    public function __construct(
        string $name,
        bool|string $show = false,
        string $maxWidth = '2xl',
        bool|string $focusable = false,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
        $this->name = $name;

        $validWidths = ['sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl'];
        $this->maxWidth = in_array($maxWidth, $validWidths) ? $maxWidth : '2xl';

        $this->maxWidthClass = [
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-lg',
            'xl' => 'sm:max-w-xl',
            '2xl' => 'sm:max-w-2xl',
            '3xl' => 'sm:max-w-3xl',
            '4xl' => 'sm:max-w-4xl',
            '5xl' => 'sm:max-w-5xl',
        ][$this->maxWidth];

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
        return view($this->getFrameworkView('ui.modal'));
    }
}
