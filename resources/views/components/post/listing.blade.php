<section class="space-y-6 pb-12">
    @auth
        <x-post.prompt />
    @endauth
    <ul class="divide-y border">

        @forelse ($posts = $this->getPosts() as $post)
            <x-post.distinct :$post wire:key="{{ $post->id }}" key="{{ $post->id }}" />
            @if ($loop->index == 2 && count($posts) > 3)
                <x-ad.adsense wire:key="{{ 'ad:' . $post->id }}" />
            @endif
        @empty
            <li class="bg-white p-3 flex items-center justify-center">
                <span>😭 We need more content</span>
            </li>
        @endforelse
    </ul>
</section>
