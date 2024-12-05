<div class="p-3 py-2 sticky top-0 w-full bg-white border border-t-0 md:border-t z-20">
    <div class="space-y-3  w-full">
        <div class="flex items-center justify-between space-x-2 relative h-12">
            <div class="z-10 flex items-center space-x-2">
                <x-button class="!p-2 bg-gray-50 block md:hidden" x-on:click="toggleSidebar" rounded icon="bars-3" flat
                    gray interaction="primary" />
                <span class="leading-none">{{ $this->title }}</span>
            </div>
            <span class="absolute left-0 right-0 flex items-center justify-center"></span>
            <div class="flex items-center space-x-2 z-10">
                <x-button xl class="!p-2 bg-gray-50 hidden sm:block" rounded icon="magnifying-glass" flat gray
                    interaction="primary" href="/explore" wire:navigate />
                <x-button xl class="!p-2 bg-gray-50 hidden sm:block" rounded icon="bell" flat gray
                    interaction="primary" href="/notifications" wire:navigate />
                @auth
                    <x-dropdown position="bottom-end">
                        <x-slot name="trigger">
                            <x-avatar md label="{{ str(Auth::user()->username[0])->upper() }}" negative />
                        </x-slot>
                        <x-dropdown.item label="Guilds" icon="squares-2x2" href="/guilds" wire:navigate />
                        <x-dropdown.item label="Premium" icon="check-badge" href="/premium" wire:navigate />
                        <x-dropdown.item label="Bookmarks" icon="bookmark" href="/bookmarks" wire:navigate />
                        <x-dropdown.item label="Profile" icon="user" href="/profile" wire:navigate />
                        <x-dropdown.item label="Settings" icon="adjustments-horizontal" href="/settings" wire:navigate />
                        <x-dropdown.item label="Logout" separator icon="arrow-right-start-on-rectangle"
                            class="!text-negative-500" wire:click="logout" />
                    </x-dropdown>
                @else
                    <x-icon name="user-circle" class="w-12 h-12 block md:hidden" outline x-on:click="toggleSidebar" />
                @endauth
            </div>
        </div>
        {{-- <div class="flex items-center justify-between space-x-4 ml-1 sm:!mt-0">
            <span class="text-center font-bold border-b-2 border-blue-600 p-3 hover:bg-gray-50 grow">FYP</span>
            <span class="text-center font-bold p-3 hover:bg-gray-50 grow">Following</span>
            <span class="text-center font-bold p-3 hover:bg-gray-50 grow">OpTic</span>
        </div> --}}
    </div>

</div>
