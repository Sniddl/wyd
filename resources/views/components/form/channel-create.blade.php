<div x-data="channelCreate()" x-modelable="channels" {{ $attributes->merge(['class' => 'space-y-2']) }}>
    <div class="bg-gray-50 rounded p-3 space-y-2">
        <template x-for="(channel, index) in getChannels()">
            <div>
                <div class="flex items-start space-x-2">
                    <div class="flex flex-col">
                        <x-button x-on:click="moveUp(index, channels)" xs type="button" flat gray icon="chevron-up"
                            rounded />
                        <x-button x-on:click="moveDown(index, channels)" xs type="button" flat gray icon="chevron-down"
                            rounded />
                    </div>
                    <x-input placeholder="name" x-model="channel.name" name="form2.channels.*.name"
                        error="This field is required" />
                    <x-button x-on:click="createThread(index)" class="!p-2 " type="button" flat gray icon="plus"
                        rounded />
                    <x-button x-on:click="deleteItem(index, channels)" wire:click="deleteChannel(channel.id)"
                        class="!p-2 " type="button" flat negative icon="trash" rounded />
                </div>
                <template x-for="(thread, index) in getThreads(channel)">
                    <div class="pl-10">
                        <div class="flex items-center space-x-2 ">
                            <div class="flex flex-col">
                                <x-button x-on:click="moveUp(index, channel.threads)" xs type="button" flat gray
                                    icon="chevron-up" rounded />
                                <x-button x-on:click="moveDown(index, channel.threads)" xs type="button" flat gray
                                    icon="chevron-down" rounded />
                            </div>
                            <x-input placeholder="name" x-model="thread.name" error="This field is required" />
                            <x-button x-on:click="deleteItem(index, channel.threads)"
                                wire:click="deleteChannel(thread.id)" class="!p-2 " type="button" flat negative
                                icon="trash" rounded />
                        </div>
                    </div>
                </template>
            </div>
        </template>
        <div x-show="!channels.length">
            You guild will have zero channels.
        </div>
        {{-- @dump($this->getErrorBag()->getMessages()) --}}
        @error('form2.channels.*.threads.*.name')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <x-button type="button" label="Add Channel" outline gray icon="plus" rounded x-on:click="createChannel" />
</div>
