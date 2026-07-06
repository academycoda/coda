@props([
    'courses',
])

<section id="courses">
    <x-ui.container class="pt-32">
        <div
            data-motion-reveal
            class="flex flex-wrap items-end justify-between gap-6"
        >
            <x-ui.heading>
                <x-slot:kicker>Kurzy</x-slot>
                <x-slot:title>
                    Dlhodobé kurzy.
                    <br />
                    <span class="font-instrument font-normal text-iris italic">Lebo učenie potrebuje čas.</span>
                </x-slot>
                <x-slot:subtitle>
                    Technológie sa nedajú naučiť za jedno popoludnie. Preto organizujeme dlhodobé kurzy, kde študenti
                    postupne budujú vedomosti, skúsenosti aj vlastné projekty.
                </x-slot>
            </x-ui.heading>
        </div>

        <div
            data-motion-courses
            data-motion-stagger
            class="mt-14 grid gap-6 lg:grid-cols-2"
        >
            @forelse ($courses as $course)
                <x-domains.courses.card
                    :course="$course"
                    :index="$loop->iteration"
                    :total="$courses->count()"
                />
            @empty
                <div class="rounded-3xl border border-dashed border-midnight/20 p-8 text-ash md:p-9">
                    Aktuálne nie sú zverejnené žiadne kurzy.
                </div>
            @endforelse
        </div>
    </x-ui.container>
</section>
