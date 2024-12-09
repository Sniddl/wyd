@props([
    'join' => true,
    'guild' => null,
])

<li class="block">
    <a class="p-3 bg-white hover:bg-gray-100 cursor-pointer block" href="{{ route('guild', $guild->identifier) }}"
        wire:navigate>
        <div class="flex items-center justify-between space-x-2 flex-wrap space-y-2">
            <div class="flex items-center space-x-2">
                <x-avatar class="w-8 h-8 xl:w-10 xl:h-10" label="AB" negative />
                <div class="leading-tight">
                    <div class="font-bold">{{ $guild->name }}</div>
                    <div class="opacity-50">/g/{{ $guild->identifier }}</div>
                </div>
            </div>
            @auth
                @if ($join)
                    <x-button class="!py-1 !px-3 !gap-x-1" label="Join" rounded icon="plus" outline gray
                        interaction="primary" />
                @endif
            @endauth
        </div>
    </a>
</li>
