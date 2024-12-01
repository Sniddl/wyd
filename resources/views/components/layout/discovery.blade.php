<div class="hidden grow  min-w-80 min-h-1 md:block space-y-6 relative">
    <div class="fixed w-full overflow-scroll top-0 bottom-0 space-y-6">
        <div class="sticky w-80 top-0 pt-3 px-3 z-10">
            <x-input icon="magnifying-glass" placeholder="Search" />
        </div>

        <div class="space-y-6 w-80 sticky top-0 pb-12 px-3">
            <div
                class=" w-[18.5rem] h-[13.875rem] bg-amber-50 border flex items-center justify-center text-2xl text-gray-300">
                #ad
            </div>
            <div class=" w-[18.5rem] bg-white border p-3 space-y-2">
                <h2 class="text-2xl font-bold">Recent Tags</h2>
                @for ($i = 0; $i < 50; $i++)
                    <a href="#" class="underline text-primary-500">{{ fake()->word() }}</a>
                @endfor
            </div>
            <div class=" w-[18.5rem] bg-white border p-3 space-y-2">
                <h2 class="text-2xl font-bold">Newest Members</h2>
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex items-center space-x-2">
                        <x-avatar md label="AB" negative />
                        <div class="leading-tight">
                            <div class="font-bold">Jinx</div>
                            <div class="opacity-50">@lol_jinx</div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

</div>
