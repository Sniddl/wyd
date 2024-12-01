<section class="space-y-6">
    <livewire:post.prompt />
    <ul class="divide-y border-t border-x">

        @foreach ($posts as $postId)
            <livewire:post.distinct />
        @endforeach
    </ul>
</section>
