<div class="fixed md:top-3 px-0 md:px-3 top-0 right-0 left-0 bottom-0 overflow-auto">
    <div class="flex items-stretch max-w-screen-xl mx-auto">
        <x-layout.aside />
        <div class="max-w-screen-sm mx-auto">
            <x-layout.status />
            <div class="!mt-6">
                {{ $slot }}
            </div>
            <x-layout.navigation />
        </div>
        <x-layout.discovery />
    </div>
</div>
