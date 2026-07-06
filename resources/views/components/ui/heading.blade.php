@props([
    'kicker' => null,
    'title',
    'subtitle' => null,
    'align' => 'left',
    'tone' => 'default',
])

<div {{
    $attributes->class([
        'max-w-3xl',
        'mx-auto text-center' => $align === 'center',
    ])
}}>
    @if ($kicker)
        <div
            @class([
                'mb-4 inline-flex items-center gap-2 font-mono text-xs tracking-widest uppercase',
                'text-indigo' => $tone === 'default',
                'text-periwinkle' => $tone === 'dark',
            ])
        >
            <x-art.symbol class="size-2.5 fill-periwinkle" />
            {{ $kicker }}
        </div>
    @endif

    <h2
        @class([
            'text-4xl leading-[1.02] font-medium tracking-normal md:text-6xl',
            'text-midnight' => $tone === 'default',
            'text-white' => $tone === 'dark',
        ])
    >
        {{ $title }}
    </h2>

    @if ($subtitle)
        <p
            @class([
                'mt-5 max-w-3xl text-lg leading-8',
                'text-ash' => $tone === 'default',
                'text-white/70' => $tone === 'dark',
                'mx-auto' => $align === 'center',
            ])
        >
            {{ $subtitle }}
        </p>
    @endif
</div>
