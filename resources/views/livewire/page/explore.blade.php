<x-layout.page spacing back="{{ route('home') }}">
    <form wire:submit="getPosts()">
        <div class="flex items-center space-x-2">
            <x-input placeholder="Search" icon="magnifying-glass" wire:model="search" />
            <x-button label="search" type="submit" />
        </div>
    </form>

    @if ($this->search)
        @php
            $guilds = $this->getGuilds();
            $users = $this->getUsers();
        @endphp
        @if ($guilds->isNotEmpty())
            <x-ui.card title="Guilds">
                <ul>
                    @foreach ($guilds as $guild)
                        <x-guild.distinct :$guild />
                    @endforeach
                </ul>
            </x-ui.card>
        @endif

        @if ($users->isNotEmpty())
            <x-ui.card title="Members">
                @foreach ($users as $member)
                    <div class="flex items-center justify-between space-x-2">
                        <div class="flex items-center space-x-2">
                            <x-avatar md label="AB" negative />
                            <div class="leading-tight">
                                <div class="font-bold w-32 whitespace-nowrap overflow-hidden text-ellipsis">
                                    {{ $member->name }}</div>
                                <div class="opacity-50 w-32 whitespace-nowrap overflow-hidden text-ellipsis">
                                    <span>@</span>
                                    <span>{{ $member->username }}</span>
                                </div>
                            </div>

                        </div>
                        @auth
                            <x-button class="!py-1 !px-3 !gap-x-1" label="Add" rounded icon="plus" outline gray
                                interaction="primary" />
                        @endauth
                    </div>
                @endforeach
            </x-ui.card>
        @endif
    @else
        <x-ui.card title="Newest Guilds">
            <ul>
                @foreach ($this->getNewestGuilds() as $guild)
                    <x-guild.distinct :$guild />
                @endforeach
            </ul>
        </x-ui.card>
    @endif
    @if ($this->search)
        <x-post.listing :prompt="false"></x-post.listing>
    @endif
</x-layout.page>
