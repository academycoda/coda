@props([
    'module',
])

<div class="grid gap-4 px-5 py-5 md:grid-cols-[3rem_1fr_1.35fr_0.8fr] md:items-center md:px-7">
    <span class="font-mono text-sm font-medium text-iris">
        M{{ str_pad((string) $module->position, 2, '0', STR_PAD_LEFT) }}
    </span>
    <span class="text-lg font-medium tracking-normal text-midnight">{{ $module->title }}</span>
    <span class="text-sm leading-6 text-ash">{{ $module->description }}</span>
    <span class="flex flex-wrap gap-1.5 md:justify-end">
        @foreach ($module->tags ?? [] as $tag)
            <span
                @class([
                    'rounded-full px-2 py-1 font-mono text-[10px]',
                    'bg-lavender text-indigo' => str_starts_with($tag, 'AI'),
                    'bg-parchment text-ash' => ! str_starts_with($tag, 'AI'),
                ])
            >
                {{ $tag }}
            </span>
        @endforeach
    </span>
</div>
