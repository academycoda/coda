@props([
    'lecturer',
])

@if ($lecturer)
    <section class="py-24 md:py-30">
        <x-ui.container>
            <x-ui.heading align="center">
                <x-slot:kicker>Lektor</x-slot>
                <x-slot:title>
                    Lektor z reálnej
                    <span class="font-instrument font-normal text-iris italic">praxe.</span>
                </x-slot>
                <x-slot:subtitle>
                    Kurz vedie človek, ktorý sa vývoju softvéru venuje profesionálne každý deň. Ukáže ti postupy z
                    reálnych projektov, prácu s modernými technológiami a dá ti spätnú väzbu na tvoju prácu.
                </x-slot>
            </x-ui.heading>

            <div class="mt-14 flex justify-center">
                <x-domains.lecturer.card :lecturer="$lecturer" />
            </div>
        </x-ui.container>
    </section>
@endif
