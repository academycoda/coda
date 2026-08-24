@php
    $principles = [
        ['01', 'huge.source-code', 'Moderné technológie', 'Vyskúšaš si technológie, nástroje a postupy, ktoré dnes používajú profesionálne tímy pri vývoji softvéru.'],
        ['02', 'huge.badge-check', 'Lektori z praxe', 'Každý kurz vedie lektor, ktorý sa téme venuje profesionálne. Získaš tak skúsenosti, postupy a spätnú väzbu priamo z reálnych projektov.'],
        ['03', 'huge.stars', 'AI ako súčasť vývoja', 'AI budeš používať počas celého procesu tvorby – pri učení, hľadaní riešení, debugovaní aj návrhu aplikácií. Nie ako skratku, ale ako nástroj, ktorému rozumieš.'],
        ['04', 'huge.code-folder', 'Reálne projekty', 'Namiesto izolovaných cvičení budeš riešiť skutočné problémy a vytvárať projekty podobné tým, ktoré vznikajú v praxi.'],
        ['05', 'huge.paint-board', 'Menej teórie, viac tvorby', 'Teóriu dostaneš vtedy, keď ti pomôže pochopiť konkrétny problém alebo rozhodnutie. Väčšinu času budeš tvoriť.'],
        ['06', 'huge.user-group', 'Komunita a podpora', 'V malej skupine dostaneš priestor na otázky, individuálnu spätnú väzbu a podporu od ľudí, ktorí sa chcú posúvať spolu s tebou.'],
    ];
@endphp

<section id="about">
    <x-ui.container class="py-32">
        <x-ui.heading data-motion-reveal>
            <x-slot:kicker>Naša misia</x-slot>
            <x-slot:title>
                Technológie pochopíš,
                <br />
                <span class="font-instrument font-normal text-iris italic">keď s nimi začneš tvoriť.</span>
            </x-slot>
            <x-slot:subtitle>
                Programovanie, AI a digitálne nástroje menia svet okolo teba. V Coda Academy ich nebudeš iba sledovať.
                Naučíš sa s nimi pracovať zodpovedne a využiješ ich pri tvorbe vlastných projektov.
            </x-slot>
        </x-ui.heading>

        <div
            data-motion-reveal
            class="mt-10 overflow-hidden rounded-3xl border border-midnight/10"
        >
            <div class="grid md:grid-cols-2 lg:grid-cols-3">
                @foreach ($principles as [$number, $icon, $title, $description])
                    <div class="min-h-60 border border-midnight/10 bg-parchment p-8 md:p-10">
                        <div class="flex items-center justify-between gap-5">
                            <div class="flex size-11 items-center justify-center rounded-xl bg-periwinkle/15">
                                <x-dynamic-component
                                    :component="'art.icons.'.$icon"
                                    class="size-7 fill-iris"
                                />
                            </div>
                            <div class="font-mono text-xs tracking-widest text-ash">{{ $number }}</div>
                        </div>

                        <h3 class="mt-5 text-2xl leading-tight font-medium tracking-normal text-midnight">
                            {{ $title }}
                        </h3>
                        <p class="mt-3.5 text-base leading-7 text-ash">{{ $description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </x-ui.container>
</section>
