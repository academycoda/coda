@php
    $types = [
        ['Workshop', 'Praktické stretnutia zamerané na jednu konkrétnu tému — napríklad AI workflow, Git alebo tvorbu prvého webu.'],
        ['Prednáška', 'Krátke talky od ľudí, ktorí denne vytvárajú weby, produkty a digitálne nástroje.'],
        ['Open session', 'Neformálne stretnutie, kde môžeš prísť s otázkou, nápadom alebo rozpracovaným projektom.'],
    ];
@endphp

<section id="events">
    <x-ui.container class="py-32">
        <div
            data-motion-reveal
            class="grid gap-10 rounded-4xl border border-midnight/10 bg-alabaster p-8 md:grid-cols-[0.9fr_1.1fr] md:p-10 lg:p-12"
        >
            <div>
                <x-ui.heading>
                    <x-slot:kicker>Udalosti</x-slot>
                    <x-slot:title>
                        Krátke formáty.
                        <span class="font-instrument font-normal text-iris italic">Na ochutnanie.</span>
                    </x-slot>
                    <x-slot:subtitle>
                        Workshopy, prednášky a open sessions pre tých, ktorí si chcú vyskúšať jednu tému bez veľkého
                        záväzku.
                    </x-slot>
                </x-ui.heading>
            </div>

            <div class="grid gap-4">
                @foreach ($types as [$label, $description])
                    <article
                        class="grid gap-3 rounded-2xl border border-midnight/10 bg-white p-5 sm:grid-cols-[9rem_1fr]"
                    >
                        <div class="flex items-center gap-2">
                            <x-art.symbol class="size-3 fill-periwinkle" />
                            <span class="font-mono text-xs tracking-widest text-iris uppercase">{{ $label }}</span>
                        </div>
                        <p class="text-sm leading-6 text-ash">{{ $description }}</p>
                    </article>
                @endforeach

                <div
                    class="flex flex-col gap-3 rounded-2xl border border-dashed border-midnight/20 p-5 sm:flex-row sm:items-center sm:justify-between"
                >
                    <div>
                        <div class="font-medium text-midnight">Zatiaľ nie sú vypísané žiadne eventy.</div>
                        <p class="mt-1 text-sm leading-6 text-ash">
                            Program doplníme, keď budú potvrdené prvé termíny a hostia.
                        </p>
                    </div>
                    <flux:button
                        size="sm"
                        variant="outline"
                        href="mailto:hello@coda.academy"
                    >
                        Daj mi vedieť
                    </flux:button>
                </div>
            </div>
        </div>
    </x-ui.container>
</section>
