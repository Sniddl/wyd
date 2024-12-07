<div>
    @auth
        @if ($this->step === 1)
            <form class="space-y-4" wire:submit="checkName">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold">Create Guild</h2>
                    <x-button type="submit" primary label="Next" right-icon="arrow-right" rounded spinner />
                </div>

                <x-input label="Name" placeholder="Top 5 Plays" wire:model="form1.name" />

                <x-input label="URL" placeholder="top5plays" wire:model="form1.url" prefix="g/" />

                <x-textarea label="Description" placeholder="Video game highlights of the week."
                    wire:model="form1.description" />
            </form>
        @endif

        @if ($this->step === 2)
            <form class="space-y-4" wire:submit="createChannels">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold">Create Channels</h2>
                    <div>
                        <x-button type="submit" primary label="Finish" right-icon="paper-airplane" rounded spinner />
                    </div>
                </div>

                <x-form.channel-create wire:model="form2.channels" />
            </form>
        @endif
    @else
        An account is required to create a guild. <button wire:click="$dispatch('modal:open', ['page.auth.login'])"
            type="button" class="text-primary-500 font-bold hover:underline">Login!</button>
    @endauth
</div>
