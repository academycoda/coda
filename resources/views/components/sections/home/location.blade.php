<section id="location">
    <x-ui.container class="py-32">
        <div class="grid items-center gap-12 lg:grid-cols-[1fr_1.2fr] lg:gap-16">
            <div data-motion-reveal>
                <x-ui.heading>
                    <x-slot:kicker>Trnava</x-slot>
                    <x-slot:title>
                        Lokálne,
                        <br />
                        <span class="font-instrument font-normal text-iris italic">nie odniekiaľ z cloudu.</span>
                    </x-slot>
                    <x-slot:subtitle>
                        Coda Academy vzniká v Trnave, pretože veríme, že silné komunity sa budujú osobne. Stretávame sa
                        v
                        <a
                            href="https://kct.sk"
                            target="_blank"
                            class="font-medium"
                        >
                            Kreatívnom centre Trnava
                        </a>
                        na Hlavnej 17, kde sa technológie stretávajú s tvorivosťou, nápadmi a ľuďmi, ktorí chcú niečo
                        vytvárať.
                    </x-slot>
                </x-ui.heading>

                <div class="mt-9 flex flex-col gap-3">
                    <div class="flex items-start gap-2 text-base leading-7 text-midnight">
                        <x-art.symbol class="mt-1.5 size-3 shrink-0 fill-periwinkle" />
                        <span>Pravidelné prezenčné stretnutia v malých skupinách</span>
                    </div>
                    <div class="flex items-start gap-2 text-base leading-7 text-midnight">
                        <x-art.symbol class="mt-1.5 size-3 shrink-0 fill-periwinkle" />
                        <span>Lektori z praxe, ktorí denne vyvíjajú weby a digitálne produkty</span>
                    </div>
                    <div class="flex items-start gap-2 text-base leading-7 text-midnight">
                        <x-art.symbol class="mt-1.5 size-3 shrink-0 fill-periwinkle" />
                        <span>Komunita, ktorá pokračuje aj po skončení kurzu</span>
                    </div>
                </div>
            </div>

            <div data-motion-reveal>
                <x-ui.map />
            </div>
        </div>
    </x-ui.container>
</section>
