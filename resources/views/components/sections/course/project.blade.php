<section
    id="project"
    class="border-y border-midnight/10 bg-alabaster py-20"
>
    <x-ui.container>
        <x-ui.heading>
            <x-slot:kicker>Výstupný projekt</x-slot>
            <x-slot:title>
                Tvoja prvá nasadená
                <br />
                <span class="font-instrument font-normal text-iris italic">vec na internete.</span>
            </x-slot>
            <x-slot:subtitle>
                V závere kurzu budeš pracovať na vlastnom projekte. Môžeš si vybrať z našich návrhov alebo prísť s
                vlastným nápadom. Cieľom je vytvoriť aplikáciu, ktorá ti dáva zmysel a na ktorej ukážeš všetko, čo si sa
                počas kurzu naučil.
            </x-slot>
        </x-ui.heading>

        <div class="mt-14 grid gap-5 md:grid-cols-3">
            <x-domains.course.project-card
                tag="Komunita"
                title="Študentská nástenka"
                :tech="['Profil', 'Komentáre', 'Auth']"
            />
            <x-domains.course.project-card
                tag="Nástroj"
                title="Plánovač úloh"
                :tech="['Kalendár', 'Dashboard', 'Notifikácie']"
            />
            <x-domains.course.project-card
                tag="Vlastný projekt"
                title="Tvoja vlastná aplikácia"
                :tech="['Think', 'Prompt', 'Ship']"
            />
        </div>
    </x-ui.container>
</section>
