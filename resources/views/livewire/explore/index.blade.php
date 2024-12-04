<x-layout.page status title="Explore" spacing back="{{ route('home') }}">
    <x-input placeholder="Search" icon="magnifying-glass" />
    <x-ui.card title="Newest Guilds">
        <ul>
            @for ($i = 0; $i < 3; $i++)
                <livewire:guild.distinct />
            @endfor
        </ul>
    </x-ui.card>
</x-layout.page>
