<?php

namespace Nasirkhan\LaravelCube\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class Error extends Component
{
    use HasFramework;

    public array $messages;

    /**
     * Create a new component instance.
     */
    public function __construct(
        array|string $messages = [],
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);

        // Ensure messages is always an array
        if (is_string($messages)) {
            $this->messages = [$messages];
        } else {
            $this->messages = $messages;
        }

        // Filter out empty messages
        $this->messages = array_filter($this->messages);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view($this->getFrameworkView('forms.error'));
    }
}
