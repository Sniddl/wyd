<section class="space-y-6">
    <livewire:post.prompt />
    <ul class="divide-y border-t border-x">

        @foreach ($posts as $postId)
            <livewire:post.distinct />
            @if ($loop->index == 2)
                <x-ad.adsense />
            @endif
        @endforeach
    </ul>
</section>
