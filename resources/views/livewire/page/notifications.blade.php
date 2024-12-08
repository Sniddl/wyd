<x-layout.page>
    <ul class="divide-y border bg-white">
        @forelse($this->getNotifications() as $notification)
            <x-dynamic-component component="{{ 'notifications.' . data_get($notification, 'type') }}" :$notification
                class="mt-4" />
        @empty
            <li class="p-3">You are all caught up!</li>
        @endforelse
        {{-- <x-notifications.reaction />
        <x-notifications.reply /> --}}
    </ul>
</x-layout.page>
