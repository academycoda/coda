@props([
    'label',
    'value',
    'highlight' => false,
])

<div @class(['border-midnight/10 p-5 lg:border-r last:lg:border-r-0', 'bg-lavender/70' => $highlight])>
    <div
        @class([
            'font-mono text-xs tracking-widest uppercase',
            'text-indigo' => $highlight,
            'text-ash' => ! $highlight,
        ])
    >
        {{ $label }}
    </div>

    <div
        @class([
            'mt-2 text-xl font-medium tracking-normal',
            'text-indigo' => $highlight,
            'text-midnight' => ! $highlight,
        ])
    >
        {{ $value }}
    </div>
</div>
