<?php

namespace App\View\Components\WireUI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use WireUi\View\WireUiComponent;

class Collapse extends WireUiComponent
{
    /**
     * Get the view / contents that represent the component.
     */
    public function blade(): View
    {
        return view('components.wire-ui.collapse');
    }
}
