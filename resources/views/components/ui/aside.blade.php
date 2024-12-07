<div @class(['relative h-full'])>
    <div class="p-3 bg-white border space-y-3 md:!h-auto" x-bind:class="{ 'h-full': asideOpen }">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start ml-1 font-bold text-2xl">
                <span>WYD.GG</span>
            </div>
            <div class="-mr-12 md:mr-0 space-x-3">
                @auth
                    <x-button class="!py-1 !px-2 !gap-x-1" label="Invite" rounded icon="user-plus" outline gray
                        interaction="primary" wire:click="$dispatch('modal:open', ['page.auth.invite'])" />
                @else
                    <x-button class="!py-1 !px-2 !gap-x-1" label="Login" rounded icon="arrow-right-end-on-rectangle" outline
                        gray interaction="primary" wire:click="$dispatch('modal:open', ['page.auth.login'])" />
                @endauth
                <x-button type="button" class="!p-2 font-bold block md:hidden" rounded icon="x-mark" flat white
                    interaction="gray" x-on:click="toggleSidebar" />
            </div>
        </div>

        {{-- buttons --}}
        <div class="-mx-3">
            <x-navigation.button icon="home" href="/" label="Home" />
            <x-navigation.button icon="magnifying-glass" href="/explore" label="Explore" />

            @if (isset($this->guild) && count($this->guild->channels))
                <x-collapse separator title="Channels" icon="chat-bubble-left-right" class="px-2">
                    <ul>
                        @foreach ($this->guild->channels as $channel)
                            @if ($channel->type == 'category')
                                <x-collapse :title="$channel->name" size="md">
                                    <ul>
                                        @foreach ($channel->threads as $thread)
                                            <li>
                                                <x-button flat gray :label="$thread->name" icon="hashtag"
                                                    href="{{ $this->guild->href($channel, $thread) }}"
                                                    class="w-full !justify-start !px-2 !py-1 !rounded" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </x-collapse>
                            @else
                                <li class="px-3">
                                    <x-button flat gray :label="$channel->name" icon="hashtag"
                                        href="{{ $this->guild->href($channel) }}"
                                        class="w-full !justify-start !px-2 !py-1 !rounded" />
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </x-collapse>
            @endif

            <x-collapse separator title="Guilds" icon="squares-2x2" class="px-2">
                <ul class="-mx-3 px-3">
                    @auth
                        <x-button flat gray class="flex items-center !justify-start !px-2 space-x-2 w-full"
                            wire:click="openModal('page.form.guild-create')" icon="plus">
                            Create Guild
                        </x-button>
                    @endauth
                    @foreach ($this->getGuildMemberships() as $guild)
                        <x-button flat gray class="flex items-center !justify-start !px-2 space-x-2 w-full"
                            href="{{ $guild->href() }}" wire:navigate>
                            <x-avatar class="w-8 h-8" label="AB" negative />
                            <div class="leading-tight">
                                <div>g/{{ $guild->identifier }}</div>
                            </div>
                        </x-button>
                    @endforeach
                </ul>
            </x-collapse>


        </div>

    </div>

</div>
