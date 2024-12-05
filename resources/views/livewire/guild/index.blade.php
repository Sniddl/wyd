<x-layout.page status title="Guilds">
    <ul class="grid divide-y grid-cols-1 border">
        @for ($i = 0; $i < 10; $i++)
            <livewire:guild.distinct />
        @endfor
    </ul>
</x-layout.page>
