<div class="hidden grow  min-w-72 min-h-1 md:block space-y-6 relative">
    <div class="w-full overflow-scroll space-y-6">

        <div class="gap-6 w-72 pb-12 grid-discovery">
            <x-ui.card class="w-72" title="Newest Members">
                @foreach ($this->getNewestMembers() as $member)
                    <div class="flex items-center justify-between space-x-2">
                        <div class="flex items-center space-x-2">
                            <x-avatar md label="AB" negative />
                            <div class="leading-tight">
                                <div class="font-bold w-32 whitespace-nowrap overflow-hidden text-ellipsis">
                                    {{ $member->name }}</div>
                                <div class="opacity-50 w-32 whitespace-nowrap overflow-hidden text-ellipsis">
                                    <span>@</span>
                                    <span>{{ $member->username }}</span>
                                </div>
                            </div>

                        </div>
                        @auth
                            <x-button class="!py-1 !px-3 !gap-x-1" label="Add" rounded icon="plus" outline gray
                                interaction="primary" />
                        @endauth
                    </div>
                @endforeach
            </x-ui.card>

            <x-ui.card class="w-72" title="Recent Tags">
                @for ($i = 0; $i < 50; $i++)
                    <a href="#" class="underline text-primary-500">{{ fake()->word() }}</a>
                @endfor
            </x-ui.card>

            <div>
                © {{ now()->year }} Snow Builds.
            </div>
        </div>
    </div>

</div>
