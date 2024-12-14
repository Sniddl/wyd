<x-layout.page spacing>
    @php
        $reactions = $this->getReactionsForPosts(collect([$post->post, $post]));
    @endphp
    @if ($post->depth >= 2)
        <div class="flex items-center justify-end px-2">
            <a class="opacity-50 hover:text-primary-500 hover:underline" href="{{ route('chain', $post->id) }}">
                View discussion
            </a>
        </div>
    @endif
    <ul class="border">
        @if ($post->post)
            <x-post.distinct :post="$post->post" chain chainBottom full :reactions="$reactions->get($post->post_id)" />
        @endif
        <x-post.distinct :$post :chain="$post->post" :full="true" :chainTop="$post->post" :reactions="$reactions->get($post->id)">
            @if ($post->post)
                <x-slot name="label">
                    <a class="opacity-50 hover:text-primary-500 hover:underline"
                        href="{{ route('post', $post->post_id) }}">
                        {{ $post->author->name }} replied
                    </a>
                </x-slot>
            @endif
        </x-post.distinct>
    </ul>
    <x-post.listing />
</x-layout.page>
