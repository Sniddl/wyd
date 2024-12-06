@props([
    'title' => null,
    'icon' => null,
    'open' => true,
    'separator' => false,
    'size' => 'xl',
])
<div>
    @if ($separator)
        <span class="py-3 relative w-full block">
            <span class="border-b absolute inset-x-3"></span>
        </span>
    @endif


    <div x-data="collapse({
        collapseOpen: '{{ $open }}'
    })" {{ $attributes }}>
        <x-button @class([
            '!justify-between w-full !px-2 !py-1 !rounded',
            'text-xl' => $size == 'xl',
        ]) flat gray lg type="button" x-on:click="toggleCollapse">
            <span class="flex items-center space-x-2">
                @if ($icon)
                    <x-icon :name="$icon" @class(['w-6 h-6' => $size == 'xl', 'w-4 h-4' => $size == 'md']) />
                @endif
                <span class="">{{ $title }}</span>
            </span>
            <x-icon name="chevron-down" @class(['w-6 h-6' => $size == 'xl', 'w-4 h-4' => $size == 'md']) x-bind:class="{ 'rotate-180': collapseOpen }" />
        </x-button>
        <div x-show="collapseOpen">{{ $slot }}</div>
    </div>
</div>
