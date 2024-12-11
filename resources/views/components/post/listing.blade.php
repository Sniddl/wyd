@props([
    'prompt' => true,
])
<section class="space-y-6 pb-12">
    @auth
        @if ($prompt)
            <x-post.prompt />
        @endif
    @endauth
    <ul class="divide-y border">
        @php
            $posts = $this->getPosts();
            $reactions = $this->getReactionsForPosts($posts);
        @endphp
        @forelse ($posts as $post)
            <x-post.distinct :$post wire:key="{{ 'post:' . $post->id }}" key="{{ 'post:' . $post->id }}"
                :reactions="$reactions->get($post->id)" />
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
