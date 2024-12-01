<div class="fixed top-3 right-0 left-0 bottom-0 overflow-auto">
    <div class="flex items-stretch max-w-screen-xl mx-auto">
        <x-layout.aside />
        <div class="max-w-screen-sm grow">
            <x-layout.status />
            <div class="!mt-9">
                {{ $slot }}
            </div>
            <x-layout.navigation />
        </div>
        <x-layout.discovery />
    </div>
</div>
