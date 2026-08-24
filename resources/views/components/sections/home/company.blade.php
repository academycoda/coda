<section id="company">
    <x-ui.container class="py-32">
        <div class="grid items-center gap-12 lg:grid-cols-[1fr_1.2fr] lg:gap-16">
            <div data-motion-reveal>
                <x-ui.heading>
                    <x-slot:kicker>Kto sme</x-slot>
                    <x-slot:title>
                        Z reálnej praxe.
                        <br />
                        <span class="font-instrument font-normal text-iris italic">Priamo v Trnave.</span>
                    </x-slot>
                    <x-slot:subtitle>
                        V softvérovej spoločnosti
                        <a
                            href="https://cosamey.com"
                            target="_blank"
                            class="font-medium"
                        >
                            Cosa Mey
                        </a>
                        každý deň tvoríme weby a aplikácie pre reálnych klientov. Coda Academy je náš vzdelávací
                        projekt, cez ktorý tieto skúsenosti odovzdávame ďalej. Zázemie pre naše kurzy nám poskytuje
                        <a
                            href="https://kct.sk"
                            target="_blank"
                            class="font-medium"
                        >
                            Kreatívne centrum Trnava.
                        </a>
                    </x-slot>
                </x-ui.heading>

                <div class="mt-9 flex flex-col gap-3">
                    <div class="flex items-start gap-2 text-base leading-7 text-midnight">
                        <x-art.symbol class="mt-1.5 size-3 shrink-0 fill-periwinkle" />
                        <span>Skúsenosti z reálnych webových projektov</span>
                    </div>
                    <div class="flex items-start gap-2 text-base leading-7 text-midnight">
                        <x-art.symbol class="mt-1.5 size-3 shrink-0 fill-periwinkle" />
                        <span>Pravidelné prezenčné stretnutia v malých skupinách</span>
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
