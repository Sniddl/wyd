@props([
    'notification' => null,
])
<div class="bg-white divide-y">
    <x-post.distinct :post="$notification->post">
        <x-slot name="label">
            <a class="opacity-50 hover:text-primary-500 hover:underline"
                href="{{ route('post', $notification->post->post_id) }}">
                {{ $notification->creator->name }} replied
            </a>
        </x-slot>
    </x-post.distinct>
</div>
