<?php

namespace App\Livewire\Traits;

use Illuminate\Support\Facades\URL;
use Livewire\Attributes\Url as AttributesUrl;

trait InteractsWithBack
{
    #[AttributesUrl()]
    public ?string $back = null;

    public function forward($url)
    {
        return URL::query($url, ['back' => $this->back ?? URL::current()]);
    }

    public function back($url = null)
    {
        return $url ?? $this->back;
    }
}
