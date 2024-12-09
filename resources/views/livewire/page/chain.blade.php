<x-layout.page spacing>
    <ul class="border">
        @foreach ($this->getChain() as $post)
            <x-post.distinct :$post chain="true" :chainTop="!$loop->first" :chainBottom="!$loop->last" :chainMiddle="!$loop->first && !$loop->last" />
        @endforeach
    </ul>
    {{-- <x-post.listing /> --}}
</x-layout.page>
