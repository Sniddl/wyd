<li class="block">
    <a class="p-3 bg-white hover:bg-gray-100 cursor-pointer block" href="/guilds/skyblock" wire:navigate>
        <div class="flex items-center justify-between space-x-2 flex-wrap space-y-2">
            <div class="flex items-center space-x-2">
                <x-avatar class="w-8 h-8 xl:w-10 xl:h-10" label="AB" negative />
                <div class="leading-tight">
                    <div class="font-bold">SkyBlock</div>
                    <div class="opacity-50">mc.skyblock.net</div>
                </div>
            </div>
            @auth
                <x-button class="!py-1 !px-3 !gap-x-1" label="Join" rounded icon="plus" outline gray
                    interaction="primary" />
            @endauth
        </div>
    </a>
</li>
