<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\View\View;

class HeaderBlock extends Component
{
    public string $title;
    public string $subTitle;
    public string $preTitle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title = '',
        string $subTitle = '',
        string $preTitle = ''
    ) {
        $this->title = $title ?: app_name();
        $this->subTitle = $subTitle;
        $this->preTitle = $preTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('cube::components.frontend.header-block');
    }
}
