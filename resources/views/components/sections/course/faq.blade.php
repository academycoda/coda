@props([
    'course',
])

<section class="border-t border-midnight/10 py-32">
    <x-ui.container class="max-w-4xl">
        <x-ui.heading align="center">
            <x-slot:kicker>Časté otázky</x-slot>
            <x-slot:title>Niečo nejasné?</x-slot>
        </x-ui.heading>

        <div
            x-data="{ open: 0 }"
            class="mt-12 border-t border-midnight/15"
        >
            @foreach ($course->faqs ?? [] as $question => $answer)
                <div class="border-b border-midnight/15">
                    <button
                        x-on:click="open = open === {{ $loop->index }} ? -1 : {{ $loop->index }}"
                        type="button"
                        class="flex w-full items-center justify-between gap-6 py-5 text-left text-lg font-medium tracking-normal text-midnight"
                    >
                        <span>{{ $question }}</span>
                        <span
                            class="flex size-7 shrink-0 items-center justify-center rounded-full border border-midnight/15 transition-transform"
                            x-bind:class="
                                open === {{ $loop->index }}
                                    ? 'bg-midnight text-white rotate-45'
                                    : 'text-midnight'
                            "
                            aria-hidden="true"
                        >
                            +
                        </span>
                    </button>

                    <div
                        class="overflow-hidden transition-all duration-300"
                        x-bind:class="open === {{ $loop->index }} ? 'max-h-80' : 'max-h-0'"
                    >
                        <p class="max-w-3xl pb-6 leading-7 text-ash">{{ $answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-ui.container>
</section>
