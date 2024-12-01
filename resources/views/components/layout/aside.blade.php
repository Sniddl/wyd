<div class="hidden w-20 xl:w-80 md:block px-3 pb-3 relative">
    <div class="sticky top-0 p-3 bg-white border space-y-3">
        <div class="flex items-center space-x-2">
            <x-avatar class="w-8 h-8 xl:w-10 xl:h-10" label="AB" negative />
            <div class="leading-tight block xl:block md:hidden sm:block">
                <div class="font-bold">Jinx</div>
                <div class="opacity-50">@lol_jinx</div>
            </div>
        </div>
        <div class="space-x-3 text-xs items-center ml-1 flex xl:flex md:hidden sm:flex">
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
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="home" flat gray
                interaction="primary"><span class="hidden xl:block">Home</span></x-button>
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="magnifying-glass" flat gray
                interaction="primary"><span class="hidden xl:block">Explore</span></x-button>
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="bell" flat gray
                interaction="primary"><span class="hidden xl:block">Notifications</span></x-button>
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="squares-2x2" flat gray
                interaction="primary"><span class="hidden xl:block">Guilds</span></x-button>

            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="check-badge" flat gray
                interaction="primary"><span class="hidden xl:block">Premium</span></x-button>

            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="bookmark" flat gray
                interaction="primary"><span class="hidden xl:block">Bookmarks</span></x-button>
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="user" flat gray
                interaction="primary"><span class="hidden xl:block">Profile</span></x-button>
            <x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" icon="adjustments-horizontal" flat gray
                interaction="primary"><span class="hidden xl:block">Settings</span></x-button>
        </div>

    </div>

</div>
