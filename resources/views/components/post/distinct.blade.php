@props([
    'post' => null,
    'replyTo' => null,
])

<li class="js-post p-3 space-y-1 bg-white relative" x-on:click="Livewire.navigate('{{ route('post', $post) }}')">
    <div class="flex items-center justify-between relative -mr-2">
        <div class="flex items-center">
            <x-avatar @class([
                'absolute hover:z-20 focus:z-20',
                'mt-6' => !$replyTo,
                'mt-0' => $replyTo,
            ]) lg label="{{ str($post->author->username[0])->upper() }}" negative />
            <div>

                <div class="flex items-center space-x-px ml-14 text-sm">
                    @if ($post->guild)
                        <x-avatar xs label="AB" negative class="absolute w-3 h-3 -ml-8 mt-1 mr-1 z-10" />
                        <span class="opacity-45">/g/{{ $post->guild->identifier }}</span>
                    @endif
                </div>
                <div class="flex items-center space-x-1 ml-14">
                    <span class="font-bold">{{ $post->author->name }}</span>
                    <span class="opacity-45 flex"><span>@</span>{{ $post->author->username }}</span>
                    <span class="opacity-45">·</span>
                    <span class="opacity-45">{{ $post->created_at->diffForHumans(short: true) }}</span>
                    @if ($post->model_type == 'void')
                        <span class="opacity-45">·</span>
                        <x-icon name="megaphone" outline class="text-black w-4 h-4 opacity-45" />
                    @endif
                </div>
                @if ($replyTo)
                    <div class="flex items-center space-x-1 ml-14 text-sm">
                        <span class="opacity-50">Replying to</span>
                        <span class="text-primary-500 flex items-center">
                            <span>@</span>
                            <a href="#" class="text-primary-500">{{ $replyTo }}</a>
                        </span>
                    </div>
                @endif
            </div>
        </div>
        <x-button class="absolute right-0 !p-2" rounded icon="ellipsis-horizontal" flat gray interaction="primary" />
    </div>
    <div class="ml-14">
        <div>{!! $post->enriched_bait ?? $post->bait !!}</div>

        <div class="flex items-center justify-between -mx-2 mt-3">
            <x-dropdown position="right" width="sm">
                <x-slot name="trigger">
                    <x-button class="!py-1 !px-2" label="123K" rounded icon="heart" flat gray interaction="negative"
                        wire:click="like($post->id)" />
                </x-slot>
                <x-dropdown.item class="!bg-white space-x-2 !justify-center block !p-0">
                    <div class="-mx-8 flex items-center justify-center">
                        <x-button class="!p-2 text-lg" rounded label="❤️" flat gray interaction="primary" />
                        <x-button class="!p-2 text-lg" rounded label="🦄" flat gray interaction="primary" />
                        <x-button class="!p-2 text-lg" rounded label="🤯" flat gray interaction="primary" />
                    </div>
                </x-dropdown.item>
            </x-dropdown>
            <x-button class="!py-1 !px-2" :label="Number::abbreviate($post->replies_count ?? $post->replies()->count())" rounded icon="chat-bubble-left" flat gray
                interaction="primary" />
            <div class="!py-1 !px-2 space-x-2 flex items-center text-sm text-gray-600">
                <x-icon name="chart-bar" class="w-4 h-4" />
                <span>123K</span>
            </div>
            <div class="space-x-1">
                <x-button class="!p-2" rounded icon="arrow-up-tray" flat gray interaction="primary" />
            </div>
        </div>
    </div>
</li>
