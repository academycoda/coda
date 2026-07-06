<section id="cta">
    <x-ui.container class="py-32">
        <div
            data-motion-reveal
            class="relative overflow-hidden rounded-4xl bg-periwinkle px-8 py-16 text-white selection:bg-white selection:text-periwinkle md:px-16 md:py-20"
        >
            <x-art.symbol
                data-motion-float
                class="absolute -top-20 -right-20 size-96 fill-white/10"
                aria-hidden="true"
            />
            <x-art.symbol-outline
                data-motion-float
                class="absolute -bottom-28 left-10 size-56 rotate-180 fill-white/10"
                aria-hidden="true"
            />

            <div class="relative max-w-3xl">
                <div class="font-mono text-xs tracking-widest text-white/80 uppercase">
                    Jeseň 2026 · Kapacita 10 · Trnava
                </div>
                <h2 class="mt-4 text-5xl leading-none font-medium tracking-normal md:text-7xl">
                    Tvoj prvý
                    <br />
                    commit je
                    <span class="font-instrument font-normal italic">blízko.</span>
                </h2>
                <p class="mt-6 max-w-xl text-lg leading-8 text-white/85">
                    Prvý kurz štartuje na jeseň.
                    <br />
                    10 miest, 1 výber, 20 týždňov, 1 vlastná aplikácia.
                </p>
                <div class="mt-9 flex flex-wrap gap-3.5">
                    <flux:button
                        variant="filled"
                        href="#courses"
                    >
                        Pozri detail a prihlás sa
                        <x-slot:iconTrailing>
                            <x-art.icons.huge.arrow-right class="size-5" />
                        </x-slot>
                    </flux:button>
                    <flux:button
                        variant="outline"
                        href="mailto:hello@coda.academy"
                        class="border-white/40! text-white! hover:bg-white/10!"
                    >
                        Mám otázku
                    </flux:button>
                </div>
            </div>
        </div>
    </x-ui.container>
</section>
