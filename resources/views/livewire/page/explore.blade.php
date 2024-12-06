<x-layout.page spacing>
    <x-input placeholder="Search" icon="magnifying-glass" />
    <x-ui.card title="Newest Guilds">
        <ul>
            @for ($i = 0; $i < 3; $i++)
                <x-guild.distinct />
            @endfor
        </ul>
    </x-ui.card>
</x-layout.page>
