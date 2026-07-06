<section
    id="hero"
    class="relative overflow-hidden"
>
    <x-ui.container class="relative py-32">
        <div class="grid items-center gap-12 lg:grid-cols-[1.25fr_1fr] lg:gap-20">
            <div>
                <div
                    data-motion-hero
                    class="inline-flex h-6 items-center gap-1.5 rounded-full border border-midnight/10 bg-white px-2.5 font-mono text-xs font-medium tracking-[0.02em] text-graphite uppercase"
                >
                    <x-art.symbol class="size-2.5 fill-periwinkle" />
                    Trnava · jeseň 2026 · Prvý kurz čoskoro
                </div>

                <h1
                    data-motion-hero
                    class="mt-7 text-5xl leading-none font-medium tracking-normal text-midnight sm:text-6xl md:text-7xl"
                >
                    Naučíme ťa
                    <br />
                    myslieť tvorivo.
                    <br />
                    <span
                        x-data="{
                            words: ['AI.', 'kódu.', 'logiky.', 'dizajnu.'],
                            current: 0,
                            visible: true,
                            init() {
                                setInterval(() => {
                                    this.visible = false

                                    setTimeout(() => {
                                        this.current = (this.current + 1) % this.words.length
                                        this.visible = true
                                    }, 180)
                                }, 2000)
                            },
                        }"
                        class="font-instrument font-normal text-iris italic"
                    >
                        Pomocou
                        <span
                            x-text="words[current]"
                            class="inline-block min-w-[4.8ch] transition duration-200"
                            x-bind:class="visible ? 'translate-y-0 opacity-100' : 'translate-y-1 opacity-0'"
                        >
                            AI.
                        </span>
                    </span>
                </h1>

                <p
                    data-motion-hero
                    class="mt-7 max-w-xl text-lg leading-8 text-graphite"
                >
                    Coda Academy je
                    <strong class="font-semibold">akadémia moderného vývoja v Trnave</strong>
                    . Učíme programovať tak, ako sa to dnes robí v reálnych tímoch - s AI ako prirodzeným parťákom, nie
                    magickou skratkou.
                </p>

                <div
                    data-motion-hero
                    class="mt-9 flex flex-wrap items-center gap-3.5"
                >
                    <flux:button
                        variant="primary"
                        href="#courses"
                    >
                        Pozri naše kurzy
                        <x-slot:iconTrailing>
                            <x-art.icons.huge.arrow-right class="size-5" />
                        </x-slot>
                    </flux:button>
                    <flux:button
                        variant="outline"
                        href="#about"
                    >
                        Kto sme?
                    </flux:button>
                </div>

                <div
                    data-motion-workflow
                    class="mt-12 inline-flex flex-wrap items-center gap-1.5 rounded-2xl border border-midnight/10 bg-alabaster p-2"
                    aria-hidden="true"
                >
                    <span
                        data-motion-workflow-item
                        class="rounded-xl bg-white px-4 py-2.5 font-mono text-xs font-bold tracking-widest text-midnight uppercase shadow-sm shadow-midnight/5"
                    >
                        think
                    </span>
                    <span
                        data-motion-workflow-item
                        class="px-1 text-ash"
                    >
                        →
                    </span>
                    <span
                        data-motion-workflow-item
                        class="rounded-xl bg-lavender px-4 py-2.5 font-mono text-xs font-bold tracking-widest text-indigo uppercase"
                    >
                        prompt
                    </span>
                    <span
                        data-motion-workflow-item
                        class="px-1 text-ash"
                    >
                        →
                    </span>
                    <span
                        data-motion-workflow-item
                        class="rounded-xl bg-midnight px-4 py-2.5 font-mono text-xs font-bold tracking-widest text-white uppercase"
                    >
                        ship
                    </span>
                </div>
            </div>

            <div
                data-motion-editor
                class="relative"
            >
                <div
                    data-motion-float
                    class="absolute -inset-4 translate-x-5 translate-y-5 rounded-[28px] border border-periwinkle/25 bg-lavender"
                    aria-hidden="true"
                ></div>

                <x-ui.editor class="relative z-10" />
            </div>
        </div>
    </x-ui.container>

    <x-art.symbol
        data-motion-float
        class="absolute -top-2 -right-28 -z-20 size-128 fill-periwinkle/10"
        aria-hidden="true"
    />
    <x-art.symbol
        data-motion-float
        class="absolute -bottom-20 -left-10 -z-20 size-56 rotate-180 fill-midnight/5"
        aria-hidden="true"
    />
</section>
