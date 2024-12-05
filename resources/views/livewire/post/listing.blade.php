<section class="space-y-6 pb-12">
    @auth
        <livewire:post.prompt />
    @endauth
    <ul class="divide-y border">

        @forelse ($posts as $post)
            <livewire:post.distinct :id="$post->id" wire:key="{{ $post->id }}" />
            @if ($loop->index == 2 && count($posts) > 3)
                <x-ad.adsense wire:key="{{ 'ad:' . $post->id }}" />
            @endif
        @empty
            <li class="bg-white p-3 flex items-center justify-center">
                <span>No posts were found 😭</span>
            </li>
        @endforelse
    </ul>
</section>
