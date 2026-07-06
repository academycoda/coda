@props([
    'course',
    'index',
    'total',
])

@php
    $meta = [
        ['Začiatok', $course->start_date->translatedFormat('m/Y')],
        ['Trvanie', "{$course->duration_weeks} týždňov"],
        ['Kapacita', "{$course->capacity} študentov"],
        ['Miesto', $course->venue?->name ?? 'TBA'],
        ['Pre koho', $course->audience ?? 'TBA'],
        ['Cena', $course->price == 0.0 ? 'zadarmo' : Number::currency($course->price)],
    ];
@endphp

<article
    data-motion-item
    @class([
        'dark' => $course->opened_at !== null,
        'relative overflow-hidden rounded-3xl border border-dashed border-midnight/20 p-8 text-midnight md:p-9 dark:border dark:border-midnight dark:bg-midnight dark:text-white',
    ])
>
    @if ($course->opened_at !== null)
        <x-art.symbol
            class="absolute -right-20 -bottom-20 size-64 fill-periwinkle/20"
            aria-hidden="true"
        />
    @endif

    <div class="relative flex items-start justify-between gap-6">
        <div class="font-mono text-xs tracking-widest text-fog dark:text-white/60">
            {{ str_pad((string) $index, 2, '0', STR_PAD_LEFT) }} /
            {{ str_pad((string) $total, 2, '0', STR_PAD_LEFT) }}
        </div>
        <div
            class="inline-flex h-6 items-center gap-1.5 rounded-full border border-midnight/20 px-2.5 font-mono text-xs font-medium tracking-[0.02em] text-ash uppercase dark:bg-periwinkle dark:text-white"
        >
            @if ($course->opened_at !== null)
                <span class="size-1.5 rounded-full bg-white"></span>
            @endif

            {{ $course->opened_at?->isFuture() ? 'Prihlášky od ' . $course->opened_at->translatedFormat('j. n. Y') : $course->status->getLabel() }}
        </div>
    </div>

    <h3 class="relative mt-8 text-3xl leading-none font-medium tracking-normal md:text-5xl">
        {{ $course->title }}
    </h3>

    @if ($course->tagline)
        <div class="relative mt-3 font-instrument text-2xl font-normal text-ash italic dark:text-white/70">
            {{ $course->tagline }}
        </div>
    @endif

    @if ($course->excerpt)
        <p class="relative mt-6 max-w-lg leading-7 text-graphite dark:text-white/80">
            {{ $course->excerpt }}
        </p>
    @endif

    <dl class="relative mt-7 grid gap-x-7 gap-y-3.5 text-sm sm:grid-cols-2">
        @foreach ($meta as [$label, $value])
            <div class="flex justify-between gap-4 border-b border-midnight/10 pb-2 dark:border-white/10">
                <dt class="text-fog dark:text-white/55">
                    {{ $label }}
                </dt>
                <dd class="font-medium text-midnight dark:text-white">{{ $value }}</dd>
            </div>
        @endforeach
    </dl>

    @if ($course->tags)
        <div class="relative mt-6 flex flex-wrap gap-1.5">
            @foreach ($course->tags as $tag)
                <span
                    class="rounded-full bg-midnight/5 px-2.5 py-1 font-mono text-xs text-ash lowercase dark:bg-white/10 dark:text-white/85"
                >
                    {{ $tag }}
                </span>
            @endforeach
        </div>
    @endif

    <div class="mt-8">
        @if ($course->opened_at)
            <flux:button href="{{ route('courses.show', $course) }}">
                Pozri detail kurzu
                <x-slot:trailingIcon>
                    <x-art.icons.huge.arrow-right class="size-5" />
                </x-slot>
            </flux:button>
        @else
            <flux:button
                class="border-dashed"
                disabled
            >
                Detail pripravujeme
                <x-slot:trailingIcon>
                    <x-art.icons.huge.arrow-right class="size-5" />
                </x-slot>
            </flux:button>
        @endif
    </div>
</article>
