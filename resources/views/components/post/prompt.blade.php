<form x-data="{ more: false }" class="py-3 space-y-2 flex flex-col items-end px-2" wire:submit="shout">
    <x-alert warning>
        <x-slot name="title" class="italic">
            <b>Pre-alpha release:</b> Content will get deleted when the site updates.
        </x-slot>
    </x-alert>
    <div x-data="{ content: '', limit: $el.dataset.limit }" data-limit="1500" class="w-full relative">
        <x-textarea x-model="content" placeholder="What are you doing?" wire:model="shoutForm.content" rows="4" />
        <p x-ref="remaining" class="text-xs opacity-50 absolute bottom-0 right-0 px-2 py-1 pointer-events-none">
            <span x-text="content.length"></span>
            <span>/</span>
            <span x-text="limit"></span>
        </p>
    </div>

    <div class="flex items-center space-x-2">
        <x-button type="submit" label="Shout" rounded right-icon="megaphone" primary interaction="primary" />
    </div>
</form>
