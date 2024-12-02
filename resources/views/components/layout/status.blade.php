@props([
    'title' => 'Home',
])
<div class="p-3 py-2 sticky top-0 w-full bg-white border border-t-0 md:border-t z-70">
    <div class="space-y-3  w-full">
        <div class="flex items-center justify-between -mr-2 space-x-2 relative">
            <div class="z-10">
                <x-button class="!p-2" rounded icon="arrow-left" flat gray interaction="primary" />
            </div>
            <span class="absolute left-0 right-0 flex items-center justify-center">{{ $title }}</span>
            <div class="flex items-center space-x-2 z-10">
                <x-button class="!py-1 !px-2 !gap-x-1" label="Upgrade" rounded icon="check-badge" outline gray
                    interaction="primary" />
                <x-avatar md label="AB" negative />
            </div>
        </div>
        {{-- <div class="flex items-center justify-between space-x-4 ml-1 sm:!mt-0">
            <span class="text-center font-bold border-b-2 border-blue-600 p-3 hover:bg-gray-100 grow">FYP</span>
            <span class="text-center font-bold p-3 hover:bg-gray-100 grow">Following</span>
            <span class="text-center font-bold p-3 hover:bg-gray-100 grow">OpTic</span>
        </div> --}}
    </div>

</div>
