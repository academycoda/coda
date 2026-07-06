@php
    $items = [
        'Čo je Coda Academy?' => 'Coda Academy je akadémia moderného vývoja v Trnave. Pomáhame mladým ľuďom pochopiť technológie, ktoré formujú dnešný svet, a učíme ich vytvárať vlastné weby, aplikácie a digitálne produkty. Nechceme byť video kurz ani školský predmet navyše. Staviame na praktickej tvorbe, malých skupinách a reálnych projektoch.',
        'Pre koho je akadémia určená?' => 'Prvé programy sú určené najmä študentom stredných škôl, ktorí sa chcú rozvíjať v technológiách a modernom vývoji softvéru. Do budúcna však plánujeme aj nadväzujúce kurzy, workshopy a ďalšie formáty pre širšiu komunitu.',
        'Kto za akadémiou stojí?' => 'Za Coda Academy stojí trnavská softvérová spoločnosť Cosa Mey a ľudia, ktorí denne navrhujú a vyvíjajú webové aplikácie pre klientov. Neučia u nás teoretici odtrhnutí od praxe, ale vývojári, ktorí pracujú s modernými technológiami, riešia reálne projekty a chcú svoje skúsenosti odovzdávať ďalej.',
        'Prečo spájate programovanie s AI?' => 'Pretože AI je prirodzenou súčasťou moderného vývoja softvéru. Učíme ju používať pri premýšľaní, hľadaní riešení, debugovaní aj tvorbe aplikácií. Nie ako skratku, ale ako nástroj, ktorý pomáha pracovať efektívnejšie.',
        'Nenahradí AI učenie programovania?' => 'Nie. AI dokáže pomôcť s návrhom riešení alebo generovaním kódu, no stále je potrebné rozumieť tomu, čo vzniká. V Coda Academy učíme študentov kriticky premýšľať, overovať výsledky a chápať princípy, na ktorých ich riešenia stoja.',
        'Čo si študent z akadémie odnesie?' => 'Nejde len o konkrétny framework alebo programovací jazyk. Študenti si odnášajú schopnosť riešiť problémy, navrhovať riešenia, pracovať s modernými nástrojmi a vytvárať vlastné projekty. Sú to zručnosti, ktoré zostávajú užitočné aj vtedy, keď sa technológie časom zmenia.',
    ];
@endphp

<section id="faq">
    <x-ui.container class="py-32">
        <div class="grid items-start gap-12 lg:grid-cols-[1fr_1.5fr] lg:gap-20">
            <div
                data-motion-reveal
                class="lg:sticky lg:top-28"
            >
                <x-ui.heading>
                    <x-slot:kicker>Pre rodičov</x-slot>
                    <x-slot:title>
                        Otázky, ktoré
                        <span class="font-instrument font-normal text-iris italic">dáva zmysel</span>
                        sa pýtať.
                    </x-slot>
                    <x-slot:subtitle>
                        Programovacia akadémia vyvoláva otázky aj mimo konkrétneho kurzu. Tu je širší kontext o tom,
                        prečo Coda existuje, ako premýšľame o výučbe a kam ju chceme posúvať.
                    </x-slot>
                </x-ui.heading>
            </div>

            <div
                data-motion-stagger
                class="border-t border-midnight/20"
            >
                @foreach ($items as $question => $answer)
                    <details
                        data-motion-item
                        class="group border-b border-midnight/20"
                        @if ($loop->first) open @endif
                    >
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between gap-6 py-6 text-left text-lg font-medium tracking-normal text-midnight"
                        >
                            {{ $question }}
                            <span
                                class="flex size-8 shrink-0 items-center justify-center rounded-full border border-midnight/20 text-xl leading-none group-open:bg-midnight group-open:text-white"
                            >
                                +
                            </span>
                        </summary>
                        <p class="max-w-2xl pb-7 text-base leading-7 text-ash">{{ $answer }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </x-ui.container>
</section>
