<x-layout.page status :title="$this->title" :guild="$this->guild">
    <livewire:post.listing :guildId="$this->guildModel?->id" :channelId="$this->channelModel?->id" />
</x-layout.page>
