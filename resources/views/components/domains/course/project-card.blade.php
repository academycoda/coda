@props([
    'tag',
    'title',
    'tech' => [],
])

<article class="relative overflow-hidden rounded-2xl border border-midnight/10 bg-white p-7">
    <x-art.symbol
        class="absolute -top-8 -right-8 size-28 fill-periwinkle/10"
        aria-hidden="true"
    />

    <div class="relative font-mono text-xs tracking-widest text-iris uppercase">{{ $tag }}</div>

    <h3 class="relative mt-3 text-2xl leading-tight font-medium tracking-normal text-midnight">
        {{ $title }}
    </h3>

    <div class="relative mt-6 flex flex-wrap gap-1.5">
        @foreach ($tech as $item)
            <span class="rounded-full bg-parchment px-2 py-1 font-mono text-xs text-ash">{{ $item }}</span>
        @endforeach
    </div>
</article>
