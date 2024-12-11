<?php

namespace App\Livewire\Layouts;

use App\Livewire\Concerns\InteractsWithGuilds;
use App\Livewire\Concerns\InteractsWithInvite;
use App\Livewire\Concerns\InteractsWithModal;
use App\Livewire\Concerns\InteractsWithMostRecentTags;
use App\Livewire\Concerns\InteractsWithNewestMembers;
use App\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

abstract class Page extends Component
{
    use InteractsWithModal;
    use InteractsWithInvite;
    use InteractsWithUser;
    use InteractsWithGuilds;
    use InteractsWithNewestMembers;
    use InteractsWithMostRecentTags;

    public ?string $title = null;

    public ?string $back = null;

    public function getTitle()
    {
        return $this->title ?? str(class_basename(static::class))->title();
    }

    public function getBack()
    {
        return $this->back;
    }
}
