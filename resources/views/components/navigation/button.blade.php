@props([
    'responsive' => true,
    'label' => null,
    'icon' => null,
    'href' => '#',
])
<x-button xl class="!py-1 !pl-4 w-full !justify-start rounded-none" :$icon flat gray interaction="primary" :$href
    wire:navigate.hover>
    <span @class(['hidden xl:block' => $responsive])>
        {{ $label }}
    </span>
</x-button>
