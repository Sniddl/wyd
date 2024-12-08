<x-layout.page spacing>
    <ul class="border">
        @if ($post->post)
            <x-post.distinct :post="$post->post" chain />
        @endif
        <x-post.distinct :$post :chain="$post->post" reply="$post->post">
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
