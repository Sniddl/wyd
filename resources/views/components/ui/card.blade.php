@props([
    'title' => false,
    'as' => 'div',
    'border' => true,
])

@php
    $class = Arr::toCssClasses(['bg-white p-3 space-y-2', 'border' => $border]);
@endphp

<{{ $as }} {{ $attributes->merge(['class' => $class]) }}>
    @if ($title)
        <h2 class="text-2xl font-bold">{{ $title }}</h2>
    @endif
    {{ $slot }}
    </{{ $as }}>
