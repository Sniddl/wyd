<x-layout.page status title="Guilds" back="{{ route('home') }}">
    <ul class="grid divide-y grid-cols-1 border">
        @for ($i = 0; $i < 10; $i++)
            <livewire:guild.distinct />
        @endfor
    </ul>
</x-layout.page>
