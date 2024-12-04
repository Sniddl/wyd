@props([
    'status' => true,
    'discovery' => true,
    'navigation' => true,
    'spacing' => false,
    'title' => 'Home',
])

<div class="fixed md:-top-px px-0 md:px-3 top-0 right-0 left-0 bottom-0 overflow-auto">

    <div class="grid-page max-w-screen-xl mx-auto gap-3 relative ">
        @if ($navigation)
            <div class="row-start-1 col-start-1  hidden md:block sticky top-0 z-40 max-w-72">
                <x-layout.aside />
            </div>
        @endif
        <div class="col-span-3 md:col-span-2 lg:col-span-1 row-span-5 ">

            @if ($status)
                <x-layout.status :$title />
                <div @class(['!mt-6', 'space-y-6' => $spacing])>
                    {{ $slot }}
                </div>
            @else
                <div @class(['space-y-6' => $spacing])>
                    {{ $slot }}
                </div>
            @endif
        </div>
        <div class="row-start-2 col-start-1 lg:row-start-1 lg:col-start-3 hidden md:block max-w-72 lg:sticky lg:top-0">
            @if ($discovery)
                <x-layout.discovery />
            @endif
        </div>

        @if ($navigation)
            <x-layout.navigation />
        @endif
    </div>

    <livewire:ui.modal />
</div>
