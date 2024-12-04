<div @class([
    'relative',
    'w-20 xl:w-72' => $this->responsive,
    'w-72' => !$this->responsive,
])>
    <div class="p-3 bg-white border space-y-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start ml-1 font-bold text-2xl">
                <span>W</span>
                <span @class([
                    'hidden xl:block' => $this->responsive,
                ])>YD.GG</span>
            </div>
            @auth
                <x-button class="!py-1 !px-2 !gap-x-1" label="Invite" rounded icon="user-plus" outline gray
                    interaction="primary" wire:click="pageModal('auth.invite')" />
            @endauth
        </div>


        {{-- <div class="flex items-center space-x-2">
            <x-avatar class="w-8 h-8 xl:w-10 xl:h-10" label="AB" negative />
            <div class="leading-tight block xl:block md:hidden sm:block">
                <div class="font-bold">Jinx</div>
                <div class="opacity-50">@lol_jinx</div>
            </div>
        </div> --}}
        {{-- <div class="space-x-3 text-xs items-center ml-1 flex xl:flex md:hidden sm:flex">
            <div class="flex items-center space-x-1">
                <span class="font-bold">123k</span>
                <span>Following</span>
            </div>
            <div class="flex items-center space-x-1">
                <span class="font-bold">123k</span>
                <span>Followers</span>
            </div>
        </div> --}}

        {{-- buttons --}}
        <div class="-mx-3">
            <x-navigation.button icon="home" href="/" label="Home" :responsive="$this->responsive" />
            <x-navigation.button icon="magnifying-glass" href="/explore" label="Explore" :responsive="$this->responsive" />
            <x-navigation.button icon="bell" href="/notifications" label="Notifications" :responsive="$this->responsive" />
            <x-navigation.button icon="squares-2x2" href="/guilds" label="Guilds" :responsive="$this->responsive" />
            <x-navigation.button icon="check-badge" href="/premium" label="Premium" :responsive="$this->responsive" />
            <x-navigation.button icon="bookmark" href="/bookmarks" label="Bookmarks" :responsive="$this->responsive" />
            <x-navigation.button icon="user" href="/me" label="Profile" :responsive="$this->responsive" />
            <x-navigation.button icon="adjustments-horizontal" href="/settings" label="Settings" :responsive="$this->responsive" />
        </div>

        @auth
            <x-dropdown icon="arrow-down-left" position="bottom-end" class="w-full">
                <x-slot name="trigger">
                    <div class="flex items-center space-x-2 border rounded-full w-full px-2 py-1">
                        <x-avatar md label="AB" negative />
                        <div>
                            <div class="font-bold">{{ Auth::user()->name }}</div>
                            <div class="text-sm opacity-50"><span>@</span>{{ Auth::user()->username }}</div>
                        </div>
                    </div>

                </x-slot>
                <x-dropdown.item label="Logout" class="!text-negative-500" wire:click="logout" />
            </x-dropdown>
        @endauth

    </div>

</div>
