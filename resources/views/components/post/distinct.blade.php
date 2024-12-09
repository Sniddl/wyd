@props([
    'post' => null,
    'label' => null,
    'chain' => false,
    'chainTop' => false,
    'chainBottom' => false,
    'chainMiddle' => false,
    'reactions' => null,
])

<li {{ $attributes->except(['class', 'x-on:click', 'x-data']) }} x-data="post"
    class="js-post p-3 space-y-1 bg-white relative overflow-hidden" x-on:click="navigate('{{ route('post', $post) }}')">
    <div class="flex items-center justify-between relative -mr-2">
        <div class="flex items-center">
            <div @class([
                'shrink-0 inline-flex absolute w-12 h-12',
                'chain' => $chain,
                'chain-top' => $chainTop,
                'chain-bottom' => $chainBottom,
                'chain-middle' => $chainMiddle,
                'mt-6' => !$label?->isNotEmpty(),
                'mt-0' => $label?->isNotEmpty(),
            ])>
                <x-avatar @class(['absolute hover:z-20 focus:z-20 avatar cursor-pointer']) lg label="{{ str($post->author->username[0])->upper() }}" negative
                    href="{{ route('profile', $post->author->username) }}" wire:navigate x-on:click.stop="" />
            </div>
            <div>

                @if ($post->guild)
                    <div class="flex items-center space-x-px ml-14 text-sm cursor-pointer" x-on:click.stop=""
                        href="{{ route('guild', $post->guild?->identifier) }}" wire:navigate>
                        <x-avatar xs label="AB" negative class="absolute w-3 h-3 -ml-8 mt-1 mr-1 z-10" />
                        <span class="opacity-45 hover:underline">/g/{{ $post->guild->identifier }}</span>
                    </div>
                @endif
                <div class="flex items-center space-x-1 ml-14">
                    <span class="flex items-center space-x-1 cursor-pointer" x-on:click.stop=""
                        href="{{ route('profile', $post->author->username) }}" wire:navigate>
                        <span class="font-bold hover:underline">{{ $post->author->name }}</span>
                        <span class="opacity-45 flex"><span>@</span>{{ $post->author->username }}</span>
                    </span>
                    <span class="opacity-45">·</span>
                    <span class="opacity-45">{{ $post->created_at->diffForHumans(short: true) }}</span>
                    @if ($post->model_type == 'void')
                        <span class="opacity-45">·</span>
                        <x-icon name="megaphone" outline class="text-black w-4 h-4 opacity-45" />
                    @endif
                </div>
                @if ($label?->isNotEmpty())
                    <div class="flex items-center space-x-1 ml-14 text-sm">
                        {{ $label }}
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
                    <x-button class="!py-1 !px-2" rounded flat gray interaction="negative"
                        x-on:click.stop="positionable.toggle();setTimeout(() => parseEmojis('.emojis'), 1)">
                        <slot name="label">
                            <div class="flex space-x-2 items-center">
                                <span dir="rtl" x-ref="reactions"
                                    class="space-x-[-0.3rem] space-x-reverse flex items-start">{{ data_get($reactions ?? [], 'emojis', '❤️') }}</span>
                                <span class="inline-block"
                                    x-ref="reactionsCount">{{ data_get($reactions ?? [], 'total', 0) }}</span>
                            </div>
                        </slot>
                    </x-button>
                </x-slot>
                <x-dropdown.item class="!bg-white space-x-2 !justify-center block !p-0">
                    <div class="-mx-8 flex items-center justify-center emojis">
                        @foreach ($this->getAvailableReactions() as $reaction)
                            <x-button class="!p-2 text-lg" rounded :label="$reaction->emoji" flat gray interaction="primary"
                                x-on:click.stop="react({{ $post->id }},{{ $reaction->id }})" />
                        @endforeach
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
