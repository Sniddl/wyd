<?php

namespace App\Livewire\Guild;

use App\Models\Channel;
use App\Models\Guild;
use App\Models\Thread;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Welcome extends Component
{
    #[Url()]
    public ?string $guild = null;

    #[Url()]
    public ?string $channel = null;

    #[Url()]
    public ?string $thread = null;

    public ?string $title = null;

    protected $guildModel = null;
    protected $channelModel = null;

    public function mount()
    {
        $this->guildModel = Guild::where('identifier', $this->guild)->firstOrFail();

        if ($this->channel) {
            $this->channelModel = $this->guildModel->channels()->firstWhere('identifier', $this->channel);

            if ($this->thread) {
                $this->channelModel = $this->channelModel->threads()->firstWhere('identifier', $this->thread);
            }
        }

        $this->title = $this->channelModel?->name ?? $this->guildModel?->name;
    }

    public function render()
    {

        return view('livewire.guild.welcome', [
            'guild' => $this->guildModel,
            'channel' => $this->channelModel,
        ]);
    }
}
