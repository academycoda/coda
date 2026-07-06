@php
    $principles = [
        ['01', 'huge.source-code', 'Moderné technológie', 'Učíme technológie, ktoré sa používajú dnes. Študenti pracujú s nástrojmi a postupmi, ktoré využívajú profesionálne tímy pri vývoji softvéru.'],
        ['02', 'huge.compass', 'Laravel ako štart, nie cieľ', 'Laravel používame ako vstupnú bránu do moderného vývoja. Princípy a spôsob premýšľania, ktoré sa naučíš, využiješ aj pri ďalších technológiách.'],
        ['03', 'huge.stars', 'AI ako súčasť vývoja', 'AI používame prirodzene počas celého procesu tvorby. Pri učení, hľadaní riešení, debugovaní aj návrhu aplikácií. Nie ako skratku, ale ako nástroj moderného vývojára.'],
        ['04', 'huge.code-folder', 'Reálne projekty', 'Najlepšie sa učí na skutočných problémoch. Namiesto izolovaných cvičení študenti vytvárajú projekty, ktoré sa podobajú tomu, čo vzniká v praxi.'],
        ['05', 'huge.paint-board', 'Menej teórie, viac tvorby', 'Veríme, že technológie sa najlepšie učia ich používaním. Teóriu vysvetľujeme vtedy, keď pomáha pochopiť konkrétny problém alebo rozhodnutie.'],
        ['06', 'huge.user-group', 'Komunita a podpora', 'Malé skupiny umožňujú individuálny prístup, spätnú väzbu a priestor na otázky. Chceme budovať komunitu mladých ľudí, ktorí sa navzájom posúvajú ďalej.'],
    ];
@endphp

<section id="about">
    <x-ui.container class="py-32">
        <x-ui.heading data-motion-reveal>
            <x-slot:kicker>Naša misia</x-slot>
            <x-slot:title>
                Pripravujeme mladých ľudí
                <br />
                <span class="font-instrument font-normal text-iris italic">na digitálnu budúcnosť.</span>
            </x-slot>
            <x-slot:subtitle>
                Technológie sa menia rýchlejšie než školské osnovy. Programovanie, umelá inteligencia a digitálne
                nástroje sa stávajú prirodzenou súčasťou mnohých profesií. Coda Academy vznikla preto, aby mladým ľuďom
                pomohla tieto technológie pochopiť, používať ich zodpovedne a vytvárať pomocou nich vlastné projekty.
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
