<?php

namespace App\View\Components\WireUI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use WireUi\Components\Dropdown\Base;

class Dropdown extends Base
{
    public function blade(): View
    {
        return view('components.wire-ui.dropdown');
    }
}
