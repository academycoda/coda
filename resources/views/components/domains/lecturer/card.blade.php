@props([
    'lecturer',
])

<article
    {{ $attributes->class(['flex max-w-3xl flex-col gap-6 rounded-2xl border border-midnight/15 p-7 sm:flex-row']) }}
>
    <div
        class="relative flex size-24 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-midnight/10 bg-alabaster"
    >
        @if ($lecturer->hasMedia('lecturer_avatar'))
            <img
                class="size-full object-cover"
                src="{{ $lecturer->getFirstMediaUrl('lecturer_avatar') }}"
                alt="{{ $lecturer->name }}"
            />
        @else
            <div
                class="absolute inset-0 bg-[radial-gradient(rgba(20,20,27,0.12)_1px,transparent_1px)] bg-size-[14px_14px]"
            ></div>
            <span class="relative font-instrument text-5xl font-normal text-ash italic">
                {{ mb_substr($lecturer->name, 0, 1) }}
            </span>
        @endif
    </div>

    <div>
        <h3 class="text-xl font-medium tracking-normal text-midnight">{{ $lecturer->name }}</h3>

        @if ($lecturer->role)
            <div class="mt-1 font-mono text-xs tracking-wider text-indigo uppercase">{{ $lecturer->role }}</div>
        @endif

        @if ($lecturer->bio)
            <p class="mt-3 text-sm leading-7 text-ash">{{ $lecturer->bio }}</p>
        @endif

        @if ($lecturer->tags)
            <div class="mt-4 flex flex-wrap gap-1.5">
                @foreach ($lecturer->tags as $tag)
                    <span class="rounded-full bg-parchment px-2 py-1 font-mono text-xs text-ash">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>
</article>
