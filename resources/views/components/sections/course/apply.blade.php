@props([
    'course',
])

@use('App\Enums\CourseStatus')

@php
    $details = [
        ['Deadline', $course->closed_at?->translatedFormat('j. n. Y G:i') ?? 'Čoskoro'],
        ['Kapacita', $course->capacity . ' študentov'],
        ['Začiatok', $course->start_date->translatedFormat('m/Y')],
        ['Cena', $course->price == 0.0 ? 'Zadarmo' : Number::currency($course->price)],
    ];

    if ($course->status === CourseStatus::Draft || $course->status === CourseStatus::Listed) {
        array_unshift($details, ['Prihlášky od', $course->opened_at?->translatedFormat('j. n. Y G:i') ?? 'Čoskoro']);
    }
@endphp

<section
    id="apply"
    class="py-24 md:py-32"
>
    <x-ui.container>
        <div
            @class([
                'relative grid gap-10 rounded-4xl bg-midnight p-6 text-white sm:p-8 md:p-12 xl:p-14',
                'items-center overflow-hidden lg:grid-cols-[0.9fr_1.1fr] lg:items-start lg:gap-12 lg:overflow-visible' =>
                    $course->status === CourseStatus::Open,
                'items-center overflow-hidden' => $course->status !== CourseStatus::Open,
            ])
        >
            <x-art.symbol
                class="absolute -right-24 -bottom-24 size-80 fill-periwinkle/18"
                aria-hidden="true"
            />

            <div
                @class([
                    'relative',
                    'lg:sticky lg:top-24 lg:self-start' => $course->status === CourseStatus::Open,
                    'max-w-3xl' => $course->status !== CourseStatus::Open,
                ])
            >
                <x-ui.heading tone="dark">
                    <x-slot:kicker>Prihlášky · {{ $course->title }}</x-slot>
                    <x-slot:title>
                        @switch($course->status)
                            @case(CourseStatus::Open)
                                Daj nám o sebe
                                <br />
                                <span class="font-instrument font-normal text-periwinkle italic">pár riadkov.</span>

                                @break
                            @case(CourseStatus::Active)
                                Tento kurz
                                <br />
                                <span class="font-instrument font-normal text-periwinkle italic">si nestihol.</span>

                                @break
                            @case(CourseStatus::Closed)
                                Prihlášky
                                <br />
                                <span class="font-instrument font-normal text-periwinkle italic">sú uzavreté.</span>

                                @break
                            @case(CourseStatus::Ended)
                                Tento kurz
                                <br />
                                <span class="font-instrument font-normal text-periwinkle italic">už dobehol.</span>

                                @break
                            @default
                                Prihlášky
                                <br />
                                <span class="font-instrument font-normal text-periwinkle italic">
                                    otvoríme čoskoro.
                                </span>
                        @endswitch
                    </x-slot>
                    <x-slot:subtitle>
                        @switch($course->status)
                            @case(CourseStatus::Open)
                                Toto nie je test. Chceme len vedieť, kto si, čo ťa motivuje a prečo ťa zaujíma svet
                                technológií. Ozveme sa ti s ďalšími krokmi.

                                @break
                            @case(CourseStatus::Active)
                                Tento kurz už beží. Nestihol si naskočiť, ale nezúfaj, ďalší beh už čoskoro otvorí
                                dvere.

                                @break
                            @case(CourseStatus::Closed)
                                Prihlášky do tohto behu sú už uzavreté. Ak máš záujem o ďalší termín alebo potrebuješ
                                doplňujúce informácie, napíš nám.

                                @break
                            @case(CourseStatus::Ended)
                                Tento beh je už za nami. Ak chceš naskočiť do ďalšieho, napíš nám a dáme ti vedieť, keď
                                otvoríme nový termín.

                                @break
                            @default
                                Prvý beh kurzu pripravujeme pre študentov stredných škôl v Trnave. Kapacita je obmedzená
                                na 10 miest, aby sme sa mohli každému venovať individuálne.
                        @endswitch
                    </x-slot>
                </x-ui.heading>

                <div
                    @class([
                        'mt-7 grid overflow-hidden rounded-2xl border border-white/10 bg-white/4 sm:grid-cols-2',
                        'lg:grid-cols-4' => $course->status !== CourseStatus::Open && count($details) === 4,
                        'lg:grid-cols-5' => $course->status !== CourseStatus::Open && count($details) === 5,
                    ])
                >
                    @foreach ($details as [$label, $value])
                        <div
                            @class([
                                'border-white/10 p-4 max-sm:not-last:border-b sm:odd:border-r',
                                'sm:nth-[-n+2]:border-b' => $course->status === CourseStatus::Open,
                                'sm:nth-[-n+4]:border-b' => $course->status !== CourseStatus::Open,
                                'lg:border-r lg:border-b-0 lg:last:border-r-0' => $course->status !== CourseStatus::Open,
                            ])
                        >
                            <div class="font-mono text-[10px] font-medium tracking-widest text-white/55 uppercase">
                                {{ $label }}
                            </div>
                            <div class="mt-2 text-sm font-medium tracking-normal text-white">
                                {{ $value }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 text-sm text-white/75">
                    <a
                        href="mailto:hello@coda.academy"
                        class="flex items-center gap-3"
                    >
                        <x-art.icons.huge.mail class="size-6 fill-alabaster" />
                        <span>hello@coda.academy</span>
                    </a>
                </div>
            </div>

            @if ($course->status === CourseStatus::Open)
                <div></div>
            @endif
        </div>
    </x-ui.container>
</section>
