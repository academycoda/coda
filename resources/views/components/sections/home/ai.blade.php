@php
    $features = [
        ['Think', 'Pochop problém. Rozdeľ ho na menšie časti. Navrhni riešenie.'],
        ['Prompt', 'Nauč sa komunikovať s AI tak, aby bola užitočným spolupracovníkom.'],
        ['Review', 'Over výsledok, nájdi chyby a pochop, prečo riešenie funguje.'],
        ['Ship', 'Premieňaj nápady na funkčné aplikácie, ktoré môžeš ukázať svetu.'],
    ];
@endphp

<section
    id="ai"
    class="relative overflow-hidden bg-midnight text-white"
>
    <x-art.symbol
        data-motion-float
        class="absolute -top-36 -left-36 size-148 rotate-180 fill-periwinkle/10"
        aria-hidden="true"
    />

    <x-ui.container class="relative py-32">
        <x-ui.heading
            data-motion-reveal
            tone="dark"
        >
            <x-slot:kicker>AI v Coda</x-slot>
            <x-slot:title>
                AI je súčasťou vývoja.
                <br />
                <span class="font-instrument font-normal text-periwinkle italic">Nie náhradou za premýšľanie.</span>
            </x-slot>
            <x-slot:subtitle>
                Umelá inteligencia dnes dokáže pomáhať pri tvorbe celých aplikácií. Študenti sa učia zadávať úlohy,
                kontrolovať výsledky a využívať AI ako súčasť moderného vývojového procesu.
            </x-slot>
        </x-ui.heading>

        <div
            data-motion-stagger
            class="mt-20 grid gap-5 md:grid-cols-2 lg:grid-cols-4"
        >
            @foreach ($features as [$title, $description])
                <article
                    data-motion-item
                    class="rounded-2xl border border-white/15 bg-white/3 p-6"
                >
                    <x-art.symbol class="size-3.5 fill-periwinkle" />
                    <h3 class="mt-4 text-lg font-medium">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-6 text-white/60">{{ $description }}</p>
                </article>
            @endforeach
        </div>

        <div
            data-motion-reveal
            class="mt-16 flex gap-4 rounded-2xl border border-white/15 bg-white/3 p-6"
        >
            <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-periwinkle">
                <span class="text-xl leading-none">!</span>
            </div>
            <div>
                <h3 class="text-lg font-medium">Žiadny "vibe coding".</h3>
                <p class="mt-1 text-white/65">
                    Generovanie kódu, ktorému nerozumieš, funguje len dovtedy, kým sa niečo nepokazí. Preto učíme
                    porozumieť riešeniu, nielen vytvoriť výsledok.
                </p>
            </div>
        </div>
    </x-ui.container>
</section>
