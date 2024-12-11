<x-ui.card :border="false">
    <div class="space-y-1">
        <div class="flex flex-col items-center absolute space-y-1">
            <x-avatar lg label="AB" negative />
        </div>
        @if ($notification->post->guild)
            <div class="flex items-center space-x-px ml-14 text-sm">
                <x-avatar xs label="AB" negative class="absolute w-3 h-3 -ml-8 mt-1 mr-1 z-10" />
                <span class="opacity-45">/g/{{ $notification->post->guild->identifier }}</span>
            </div>
        @endif
        <div class="ml-14">
            <span class="font-bold">Jinx</span>
            <span>reacted {{ collect($notification->messages)->join('') }} to your post</span>
        </div>
        <p class="ml-14 opacity-50">{{ $notification->post->bait }}</p>
    </div>
</x-ui.card>
