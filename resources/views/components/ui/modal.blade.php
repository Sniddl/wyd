<div>
    @if ($this->modalComponent)
        <x-modal name="pageModal" :show="true" class="!z-70" x-on:close="$dispatch('modal:close')"
            wire:model.live="modalComponent">

            <x-ui.card class="max-w-screen-lg w-full fixed bottom-0 top-8">
                @livewire($this->modalComponent, key($this->modalComponent))
            </x-ui.card>

        </x-modal>
    @endif
</div>
