@props([
    'lecturer',
])

@if ($lecturer)
    <section class="py-24 md:py-30">
        <x-ui.container>
            <x-ui.heading align="center">
                <x-slot:kicker>Lektori</x-slot>
                <x-slot:title>
                    Lektor z reálnej
                    <span class="font-instrument font-normal text-iris italic">praxe.</span>
                </x-slot>
                <x-slot:subtitle>
                    Kurz vedie človek, ktorý sa vývoju softvéru venuje profesionálne každý deň. Pracuje na reálnych
                    projektoch, používa moderné technológie a svoje skúsenosti odovzdáva ďalej študentom v Trnave.
                </x-slot>
            </x-ui.heading>

            <div class="mt-14 flex justify-center">
                <x-domains.lecturer.card :lecturer="$lecturer" />
            </div>
        </x-ui.container>
    </section>
@endif
