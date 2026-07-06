@props([
    'course',
])

@php
    $meta = [
        ['Začiatok', $course->start_date->translatedFormat('m/Y'), false],
        ['Trvanie', $course->duration_weeks . ' týždňov', false],
        ['Kapacita', $course->capacity . ' študentov', false],
        ['Pre koho', $course->audience ?? 'To be announced', false],
        ['Cena', $course->price == 0.0 ? 'Zadarmo' : Number::currency($course->price), true],
    ];
@endphp

<section class="relative overflow-hidden py-16 md:py-20">
    <x-art.symbol
        class="absolute top-5 -right-28 size-120 fill-periwinkle/10"
        aria-hidden="true"
    />

    <x-ui.container class="relative">
        <div
            class="inline-flex h-6 items-center gap-1.5 rounded-full bg-midnight px-2.5 font-mono text-xs font-medium tracking-[0.02em] text-white uppercase"
        >
            <span class="size-1.5 rounded-full bg-periwinkle"></span>
            Kurz · {{ $course->status->getLabel() }}
        </div>

        <h1 class="mt-7 text-[clamp(3.5rem,8vw,8.25rem)] leading-[0.94] font-medium tracking-normal text-midnight">
            {{ $course->title }}
        </h1>

        @if ($course->tagline)
            <div class="mt-6 text-xl tracking-normal text-ash md:text-2xl">
                {{ $course->tagline }}
            </div>
        @endif

        <div
            class="mt-14 grid overflow-hidden rounded-2xl border border-midnight/10 bg-white md:grid-cols-2 lg:grid-cols-5"
        >
            @foreach ($meta as [$label, $value, $highlight])
                <x-domains.course.meta-cell
                    :label="$label"
                    :value="$value"
                    :highlight="$highlight"
                />
            @endforeach
        </div>

        <div class="mt-8 flex flex-wrap items-center gap-3.5">
            @if ($course->is_open)
                <flux:button
                    variant="primary"
                    href="#apply"
                >
                    Prihlásiť sa
                    <x-slot:iconTrailing>
                        <x-art.icons.huge.arrow-right class="size-5" />
                    </x-slot>
                </flux:button>
            @endif

            <flux:button
                variant="outline"
                href="#curriculum"
            >
                Pozrieť program
            </flux:button>
            <div class="font-mono text-xs leading-5 text-ash md:ml-2">
                @if ($course->opened_at && $course->closed_at)
                    Prihlášky prijímame od {{ $course->opened_at->translatedFormat('j. n. Y G:i') }} do
                    <span class="font-bold">{{ $course->closed_at->translatedFormat('j. n. Y G:i') }}</span>
                @endif
            </div>
        </div>
    </x-ui.container>
</section>
