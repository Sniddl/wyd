<div @class([
    'relative h-full',
    'w-20 xl:w-72' => $this->responsive,
    'w-72' => !$this->responsive,
])>
    <div class="p-3 bg-white border space-y-3 md:!h-auto" x-bind:class="{ 'h-full': asideOpen }">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start ml-1 font-bold text-2xl">
                <span>W</span>
                <span @class([
                    'hidden xl:block' => $this->responsive,
                ])>YD.GG</span>
            </div>
            <div class="-mr-12 md:mr-0 space-x-3">
                @auth
                    <x-button class="!py-1 !px-2 !gap-x-1" label="Invite" rounded icon="user-plus" outline gray
                        interaction="primary" wire:click="pageModal('auth.invite')" />
                @else
                    <x-button class="!py-1 !px-2 !gap-x-1" label="Login" rounded icon="arrow-right-end-on-rectangle" outline
                        gray interaction="primary" wire:click="pageModal('auth.login')" />
                @endauth
                <x-button type="button" class="!p-2 font-bold block md:hidden" rounded icon="x-mark" flat white
                    interaction="gray" x-on:click="toggleSidebar" />
            </div>
        </div>

        {{-- buttons --}}
        <div class="-mx-3">
            <x-navigation.button icon="home" href="/" label="Home" :responsive="$this->responsive" />
            <x-navigation.button icon="magnifying-glass" href="/explore" label="Explore" :responsive="$this->responsive" />

            <x-collapse separator title="Guilds" icon="squares-2x2">
                <ul class="space-y-2">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="flex items-center justify-between space-x-2 flex-wrap space-y-2">
                            <div class="flex items-center space-x-2">
                                <x-avatar class="w-8 h-8" label="AB" negative />
                                <div class="leading-tight">
                                    <div>SkyBlock</div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </ul>
            </x-collapse>
        </div>

    </div>

</div>
