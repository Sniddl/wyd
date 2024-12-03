@props([
    'responsive' => false,
])

<div @class([
    'relative',
    'w-20 xl:w-72' => $responsive,
    'w-72' => !$responsive,
])>
    <div class="p-3 bg-white border space-y-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start ml-1 font-bold text-2xl">
                <span>W</span>
                <span @class([
                    'hidden xl:block' => $responsive,
                ])>YD.GG</span>
            </div>
            <x-button class="!py-1 !px-2 !gap-x-1" label="Upgrade" rounded icon="check-badge" outline gray
                interaction="primary" />
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
            <x-navigation.button icon="home" href="/" label="Home" :$responsive />
            <x-navigation.button icon="magnifying-glass" href="/explore" label="Explore" :$responsive />
            <x-navigation.button icon="bell" href="/notifications" label="Notifications" :$responsive />
            <x-navigation.button icon="squares-2x2" href="/guilds" label="Guilds" :$responsive />
            <x-navigation.button icon="check-badge" href="/premium" label="Premium" :$responsive />
            <x-navigation.button icon="bookmark" href="/bookmarks" label="Bookmarks" :$responsive />
            <x-navigation.button icon="user" href="/me" label="Profile" :$responsive />
            <x-navigation.button icon="adjustments-horizontal" href="/settings" label="Settings" :$responsive />
        </div>

    </div>

</div>
