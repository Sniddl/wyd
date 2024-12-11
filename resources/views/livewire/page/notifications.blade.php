<x-layout.page>
    <ul class="divide-y border bg-white">
        @php
            $notifications = $this->getNotifications();
            $posts = $notifications->pluck('post');
            $reactions = $this->getReactionsForPosts($posts);
        @endphp
        @forelse($notifications as $notification)
            <x-dynamic-component component="{{ 'notifications.' . data_get($notification, 'type') }}" :$notification
                class="mt-4" :reactions="$reactions->get($notification->post_id)" />
        @empty
            <li class="p-3">You are all caught up!</li>
        @endforelse
        {{-- <x-notifications.reaction />
        <x-notifications.reply /> --}}
    </ul>
</x-layout.page>
