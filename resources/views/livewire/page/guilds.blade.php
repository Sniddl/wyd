<x-layout.page>
    <div class="divide-y border">
        @for ($i = 0; $i < 10; $i++)
            <x-guild.distinct />
        @endfor
    </div>
</x-layout.page>
