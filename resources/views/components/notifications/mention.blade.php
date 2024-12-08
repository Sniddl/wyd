@props([
    'notification' => null,
])
<div class="bg-white divide-y">
    {{-- <div class="ml-14 px-3 py-1">
        <span class="font-bold">{{ $notification->creator->name }}</span>
        <span>mentioned you in a post</span>
    </div> --}}
    <x-post.distinct :post="$notification->post" />
</div>
