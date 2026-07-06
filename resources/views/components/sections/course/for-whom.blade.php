@php
    $yes = [
        'si na strednej škole a chceš sa naučiť reálne programovať,',
        'doteraz si nikdy nič nenaprogramoval(a) - alebo len trochu,',
        'chceš pochopiť, ako web funguje pod kapotou,',
        'zaujíma ťa, ako AI mení spôsob tvorby softvéru,',
        'si pripravený/á venovať čas aj vlastným projektom a úlohám,',
        'vieš pravidelne chodiť na lekcie v Trnave.',
    ];

    $no = [
        'hľadáš online kurz, ktorý si prejdeš za víkend,',
        'očakávaš, že AI za teba vyrieši všetku prácu,',
        'nie si ochotný/á občas si na niečom polámať zuby,',
        'hľadáš pokročilé témy pre skúsených vývojárov,',
        'zaujíma ťa primárne iný typ vývoja než webové aplikácie.',
    ];
@endphp

<section class="border-y border-midnight/10 bg-midnight py-24 text-white md:py-30">
    <x-ui.container>
        <x-ui.heading
            align="center"
            tone="dark"
            class="max-w-4xl"
        >
            <x-slot:kicker>fit check</x-slot>
            <x-slot:title>
                Nie každý kurz
                <br class="md:hidden" />
                <span class="font-instrument font-normal text-periwinkle italic">má byť pre každého.</span>
            </x-slot>
            <x-slot:subtitle>
                Najlepšie to funguje, keď vieš, do čoho ideš. Tu je rýchly filter pred prihláškou.
            </x-slot>
        </x-ui.heading>

        <div class="mx-auto mt-14 max-w-6xl overflow-hidden rounded-3xl border border-white/12 bg-white/4">
            <div
                class="grid border-b border-white/10 bg-white/3 px-5 py-4 font-mono text-xs tracking-widest text-white/50 uppercase sm:grid-cols-[1fr_auto] sm:items-center"
            >
                <span>student.fit</span>
                <span class="hidden text-periwinkle sm:block">if / else</span>
            </div>

            <div class="grid lg:grid-cols-2">
                <article class="border-b border-white/10 p-6 sm:p-8 lg:border-r lg:border-b-0 xl:p-10">
                    <div class="flex items-center gap-3">
                        <span
                            class="font-mono text-sm text-periwinkle"
                            aria-hidden="true"
                        >
                            if
                        </span>
                        <h3 class="text-xl leading-tight font-medium tracking-normal md:text-2xl">
                            Tento kurz je pre teba, ak...
                        </h3>
                    </div>

                    <ul class="mt-7 space-y-4">
                        @foreach ($yes as $item)
                            <li class="grid grid-cols-[1.25rem_1fr] gap-3 text-base leading-7 text-white/78">
                                <span
                                    class="font-mono text-periwinkle"
                                    aria-hidden="true"
                                >
                                    +
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>

                <article class="bg-white/2.5 p-6 sm:p-8 xl:p-10">
                    <div class="flex items-center gap-3">
                        <span
                            class="font-mono text-sm text-white/50"
                            aria-hidden="true"
                        >
                            else
                        </span>
                        <h3 class="text-xl leading-tight font-medium tracking-normal md:text-2xl">
                            Toto NIE je pre teba, ak...
                        </h3>
                    </div>

                    <ul class="mt-7 space-y-4">
                        @foreach ($no as $item)
                            <li class="grid grid-cols-[1.25rem_1fr] gap-3 text-base leading-7 text-white/58">
                                <span
                                    class="font-mono text-white/32"
                                    aria-hidden="true"
                                >
                                    -
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <p class="mt-8 border-t border-white/10 pt-6 text-base leading-7 text-white/70">
                        Ak máš pocit, že tento kurz nie je pre teba, ale rád/a by si sa pridal/a do našej komunity,
                        neváhaj nám napísať.
                    </p>
                </article>
            </div>
        </div>

        <div
            class="mx-auto mt-6 flex max-w-6xl flex-col gap-4 rounded-2xl border border-pink-300/40 bg-pink-300/15 p-5 sm:flex-row sm:items-start sm:p-6"
        >
            <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-pink-300">
                <x-art.icons.huge.female class="size-5 fill-midnight" />
            </div>

            <div>
                <div class="font-mono text-xs tracking-widest text-pink-300 uppercase">girls very welcome</div>
                <h3 class="mt-2 text-xl font-medium tracking-normal text-white">Kurz je aj pre dievčatá.</h3>
                <p class="text-white/70">
                    Programovanie nie je chlapčenský klub. Ak ťa láka web, technológie alebo AI, si tu vítaná rovnako
                    ako ktokoľvek iný.
                </p>
            </div>
        </div>
    </x-ui.container>
</section>
