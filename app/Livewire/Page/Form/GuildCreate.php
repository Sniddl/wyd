<?php

namespace App\Livewire\Page\Form;

use App\Livewire\Forms\ChannelCreate as ChannelForm;
use App\Models\Guild;
use Livewire\Component;
use App\Livewire\Forms\GuildCreate as GuildForm;
use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;

class GuildCreate extends Component
{

    public int $step = 1;

    public ?int $guildId = null;

    public GuildForm $form1;
    public ChannelForm $form2;

    public function render()
    {
        return view('livewire.page.form.guild-create');
    }

    public function mount()
    {
        $this->prepareChannels();
    }

    public function prepareChannels()
    {
        if ($this->guildId) {
            $guild = Guild::with('channels.threads')->findOrFail($this->guildId);
            $this->form2->channels = $guild->channels->map(fn($channel) => [
                ...$channel->only(['id', 'name', 'order']),
                'threads' => $channel->threads->map->only(['id', 'name', 'order'])->toArray()
            ])->toArray();
        }
    }

    public function checkName()
    {
        $this->form1->validate();

        /** @var \App\Models\Guild $guild */
        $guild = Guild::create([
            'name' => $this->form1->name,
            'identifier' => $this->form1->url,
            'description' => $this->form1->description,
            'owner_id' => Auth::user()->id,
        ]);

        $guild->members()->sync([Auth::user()->id]);

        $this->guildId = $guild->id;
        $this->prepareChannels();
        $this->step = 2;
    }

    public function createChannels()
    {
        $guild = Guild::findOrFail($this->guildId);
        $data = $this->form2->validate();
        foreach (data_get($data, 'channels') as $channel) {
            $threads = data_get($channel, 'threads');
            $identifier = str(data_get($channel, 'name'))->slug();
            $channelModel = $guild->channels()->withTrashed()->firstOrNew(compact('identifier'));
            $channelModel->fill([
                'order' => data_get($channel, 'order'),
                'name' => data_get($channel, 'name'),
                'deleted_at' => null,
                'type' => count($threads) > 0 ? 'category' : 'channel',
            ])->save();
            foreach ($threads as $thread) {
                $identifier = str(data_get($thread, 'name'))->slug();
                $threadModel = $channelModel->threads()->withTrashed()->firstOrNew(compact('identifier'));
                $threadModel->fill([
                    'order' => data_get($thread, 'order'),
                    'name' => data_get($thread, 'name'),
                    'deleted_at' => null,
                    'type' => 'channel',
                    'guild_id' => $this->guildId
                ])->save();
            }
        }
        $this->redirect(route('guild', compact('guild')));
    }

    public function deleteChannel($channelId)
    {
        Channel::where('id', $channelId)->delete();
    }
}
