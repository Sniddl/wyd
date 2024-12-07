<div>
    @if ($this->step === 1)
        <form class="space-y-4" wire:submit="checkName">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold">Create Guild</h2>
                <x-button type="submit" primary label="Next" right-icon="arrow-right" rounded spinner />
            </div>

            <x-input label="Name" placeholder="top5plays" wire:model="form.name" />

            <x-textarea label="Description" placeholder="Video game highlights of the week."
                wire:model="form.description" />
        </form>
    @endif

    @if ($this->step === 2)
        <form class="space-y-4" wire:submit="checkName">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold">Create Channels</h2>
                <div>
                    <x-button type="button" gray outline label="Back" rounded wire:click="back" />
                    <x-button type="submit" primary label="Finish" right-icon="paper-airplane" rounded spinner />
                </div>
            </div>


            <div class="bg-gray-50 rounded p-3 space-y-2">
                <div class="flex items-center space-x-2">
                    <x-input placeholder="name" wire:model="form.name" />
                    <x-dropdown position="bottom-end">
                        <x-slot name="trigger">
                            <x-button class="!p-2 " type="button" flat gray icon="ellipsis-vertical" rounded />
                        </x-slot>
                        <x-dropdown.item label="Create Thread" icon="plus" href="/settings" wire:navigate />
                        <x-dropdown.item label="Delete" separator icon="trash" class="!text-negative-500" />
                    </x-dropdown>

                </div>
                <div class="pl-10">
                    <div class="flex items-center space-x-2 ">
                        <x-input placeholder="name" wire:model="form.name" />
                        <x-dropdown position="bottom-end">
                            <x-slot name="trigger">
                                <x-button class="!p-2 " type="button" flat gray icon="ellipsis-vertical" rounded />
                            </x-slot>
                            <x-dropdown.item label="Delete" icon="trash" class="!text-negative-500" />
                        </x-dropdown>
                    </div>
                </div>
            </div>
            <x-button type="button" label="Add Channel" outline gray icon="plus" rounded wire:click="addChannel" />
        </form>
    @endif
</div>
