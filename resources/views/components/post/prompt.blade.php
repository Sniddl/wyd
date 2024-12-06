<form class="py-3 space-y-2 flex flex-col items-end px-2" wire:submit="shout">
    <x-alert warning>
        <x-slot name="title" class="italic">
            <b>Pre-alpha release:</b> Content will get deleted when the site updates.
        </x-slot>
    </x-alert>
    <x-textarea placeholder="What are you doing?" wire:model="shoutForm.bait" />
    <x-button type="submit" label="Shout" rounded right-icon="megaphone" primary interaction="primary" />
</form>
