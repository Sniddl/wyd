<x-layout.page status title="Guilds">
    <ul class="grid gap-3 grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
        @for ($i = 0; $i < 10; $i++)
            <li class="p-3 border bg-white">
                <div class="flex items-center space-x-2">
                    <x-avatar class="w-8 h-8 xl:w-10 xl:h-10" label="AB" negative />
                    <div class="leading-tight">
                        <div class="font-bold">SkyBlock</div>
                        <div class="opacity-50">mc.skyblock.net</div>
                    </div>
                </div>
            </li>
        @endfor
    </ul>
</x-layout.page>
