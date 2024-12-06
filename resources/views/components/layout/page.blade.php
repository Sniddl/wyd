@props([
    'status' => true,
    'discovery' => true,
    'navigation' => true,
    'spacing' => false,
    'guild' => null,
])

<div x-data="page" class="fixed md:-top-px px-0 md:px-3 top-0 right-0 left-0 bottom-0 overflow-auto">

    <div class="grid-page max-w-screen-xl mx-auto md:gap-3 gap-0 relative ">
        @if ($navigation)
            <div class="absolute md:hidden inset-0 bg-black opacity-40 z-30" x-on:click="toggleSidebar"
                x-bind:class="{
                    'hidden': !asideOpen
                }">
            </div>
            <div class="row-start-1 col-start-1 sticky top-0 z-40 max-w-72 w-72 md:block md:!relative"
                x-bind:class="{
                    '!absolute top-0 bottom-0': asideOpen,
                    'hidden': !asideOpen
                }">

                <x-ui.aside />
            </div>
        @endif
        <div
            class="col-span-3 row-start-1 col-start-1 md:col-start-2 md:col-span-2 lg:col-span-1 row-span-5 min-h-screen">

            @if ($status)
                <x-ui.status-bar />
                <div @class(['!mt-6', 'space-y-6' => $spacing])>
                    {{ $slot }}
                </div>
            @else
                <div @class(['space-y-6' => $spacing])>
                    {{ $slot }}
                </div>
            @endif
        </div>
        <div
            class="row-start-2 col-start-1 lg:row-start-1 lg:col-start-3 hidden md:block max-w-72 w-72 lg:sticky lg:top-0">
            @if ($discovery)
                <x-ui.discovery />
            @endif
        </div>

        @if ($navigation)
            <x-layout.navigation />
        @endif
    </div>

    <x-ui.modal />
</div>
