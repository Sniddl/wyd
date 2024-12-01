<div class="hidden sm:block px-3 pb-3 relative">
    <div class="sticky top-0 p-3 bg-white rounded border space-y-3">
        <div class="flex items-center space-x-2">
            <x-avatar md label="AB" negative />
            <div class="leading-tight">
                <div class="font-bold">Jinx</div>
                <div class="opacity-50">@lol_jinx</div>
            </div>
        </div>
        <div class="space-x-3 text-xs flex items-center ml-1">
            <div class="flex items-center space-x-1">
                <span class="font-bold">123k</span>
                <span>Following</span>
            </div>
            <div class="flex items-center space-x-1">
                <span class="font-bold">123k</span>
                <span>Followers</span>
            </div>
        </div>

        {{-- buttons --}}
        <div class="-mx-3">
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="home" label="Home" flat gray
                interaction="primary" />
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="bell" label="Notifications"
                flat gray interaction="primary" />
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="squares-2x2" label="Guilds" flat
                gray interaction="primary" />
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="check-badge" label="Premium" flat
                gray interaction="primary" />

            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="bookmark" label="Bookmarks" flat
                gray interaction="primary" />
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="user" label="Profile" flat gray
                interaction="primary" />
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="adjustments-horizontal"
                label="Settings" flat gray interaction="primary" />
        </div>

    </div>

</div>
