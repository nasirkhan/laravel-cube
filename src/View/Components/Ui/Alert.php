<?php

namespace Nasirkhan\LaravelCube\View\Components\Ui;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;

class Alert extends Component
{
    use CastsBooleans;

    public bool $dismissible;

    public function __construct(
        public string $type = 'info',
        bool|string $dismissible = true,
    ) {
        $this->dismissible = $this->castBool($dismissible);

        // Normalise 'danger' → 'error' for consistency
        if ($this->type === 'danger') {
            $this->type = 'error';
        }
    }

    public function colorClasses(): string
    {
        return match ($this->type) {
            'success' => 'text-green-800 border-green-300 bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800',
            'error'   => 'text-red-800 border-red-300 bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800',
            'warning' => 'text-yellow-800 border-yellow-300 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800',
            default   => 'text-blue-800 border-blue-300 bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800',
        };
    }

    public function closeColorClasses(): string
    {
        return match ($this->type) {
            'success' => 'bg-green-50 text-green-500 hover:bg-green-200 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700',
            'error'   => 'bg-red-50 text-red-500 hover:bg-red-200 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700',
            'warning' => 'bg-yellow-50 text-yellow-500 hover:bg-yellow-200 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700',
            default   => 'bg-blue-50 text-blue-500 hover:bg-blue-200 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700',
        };
    }

    public function render(): View
    {
        return view('cube::components.ui.alert');
    }
}
