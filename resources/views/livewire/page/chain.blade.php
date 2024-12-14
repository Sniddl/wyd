<x-layout.page spacing>
    @php
        $posts = $this->getChain();
        $reactions = $this->getReactionsForPosts($posts);
    @endphp
    <ul class="border">
        @foreach ($posts as $post)
            <x-post.distinct :$post full chain :chainTop="!$loop->first" :chainBottom="!$loop->last" :chainMiddle="!$loop->first && !$loop->last"
                :reactions="$reactions->get($post->id)" />
        @endforeach
    </ul>
    {{-- <x-post.listing /> --}}
</x-layout.page>
