<x-layout.page spacing back="{{ route('home') }}">
    <x-input placeholder="Search" icon="magnifying-glass" />
    <x-ui.card title="Newest Guilds">
        <ul>
            @foreach ($this->getNewestGuilds() as $guild)
                <x-guild.distinct :$guild />
            @endforeach
        </ul>
    </x-ui.card>
</x-layout.page>
