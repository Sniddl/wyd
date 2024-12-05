@props([
    'title' => null,
    'icon' => null,
    'open' => true,
    'separator' => false,
])
<div>
    @if ($separator)
        <span class="py-3 relative w-full block">
            <span class="border-b absolute inset-x-3"></span>
        </span>
    @endif


    <div x-data="collapse({
        collapseOpen: '{{ $open }}'
    })" {{ $attributes->merge(['class' => 'px-2']) }}>
        <x-button class="!justify-between w-full text-xl !px-2 !py-1 !rounded" flat gray lg type="button"
            x-on:click="toggleCollapse">
            <span class="flex items-center space-x-2">
                <x-icon :name="$icon" class="w-6 h-6" />
                <span class="">{{ $title }}</span>
            </span>
            <x-icon name="chevron-down" class="w-6 h-6" x-bind:class="{ 'rotate-180': collapseOpen }" />
        </x-button>
        <div x-show="collapseOpen" class="px-3 py-2">{{ $slot }}</div>
    </div>
</div>
