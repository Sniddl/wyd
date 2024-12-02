<div class="hidden grow  min-w-72 min-h-1 md:block space-y-6 relative">
    <div class="w-full overflow-scroll space-y-6">

        <div class="gap-6 w-72 pb-12 grid-discovery">
            <div class=" w-72 bg-white border p-3 space-y-2 row-start-2 lg:row-start-1">
                <h2 class="text-2xl font-bold">Newest Members</h2>
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex items-center justify-between space-x-2">
                        <div class="flex items-center space-x-2">
                            <x-avatar md label="AB" negative />
                            <div class="leading-tight">
                                <div class="font-bold">Jinx</div>
                                <div class="opacity-50">@lol_jinx</div>
                            </div>

                        </div>
                        <x-button class="!py-1 !px-3 !gap-x-1" label="Add" rounded icon="plus" outline gray
                            interaction="primary" />
                    </div>
                @endfor

            </div>

            <div class=" w-72 bg-white border p-3 space-y-2">
                <h2 class="text-2xl font-bold">Recent Tags</h2>
                @for ($i = 0; $i < 50; $i++)
                    <a href="#" class="underline text-primary-500">{{ fake()->word() }}</a>
                @endfor
            </div>

            <div>
                © {{ now()->year }} Snow Laboratory.
            </div>
        </div>
    </div>

</div>
