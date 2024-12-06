<?php

namespace App\Livewire\Layouts;

use App\Livewire\Concerns\InteractsWithInvite;
use App\Livewire\Concerns\InteractsWithModal;
use App\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

abstract class Page extends Component
{
    use InteractsWithModal;
    use InteractsWithInvite;
    use InteractsWithUser;

    public ?string $title = null;

    public function getTitle()
    {
        return $this->title ?? str(class_basename(static::class))->title();
    }
}
