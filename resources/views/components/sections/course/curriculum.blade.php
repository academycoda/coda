@props([
    'modules',
])

@php
    /** @var \Illuminate\Support\Collection<int, \App\Models\Module> $modules */
    $phases = $modules
        ->pluck('section')
        ->filter()
        ->unique()
        ->values();
@endphp

@if ($modules->isNotEmpty())
    <section
        x-data="{ phase: 'all' }"
        id="curriculum"
        class="py-24 md:py-30"
    >
        <x-ui.container>
            <div class="mb-12 flex flex-wrap items-end justify-between gap-6">
                <x-ui.heading>
                    <x-slot:kicker>Modul po module</x-slot>
                    <x-slot:title>
                        Program kurzu,
                        <br />
                        <span class="font-instrument font-normal text-iris italic">krok za krokom.</span>
                    </x-slot>
                </x-ui.heading>

                @if ($phases->isNotEmpty())
                    <div class="max-w-full overflow-x-auto max-sm:hidden">
                        <div class="flex w-max gap-1.5 rounded-full border border-midnight/15 p-1">
                            <button
                                x-on:click="phase = 'all'"
                                type="button"
                                class="shrink-0 rounded-full px-4 py-2 text-sm font-medium whitespace-nowrap transition"
                                x-bind:class="phase === 'all' ? 'bg-midnight text-white' : 'text-ash hover:text-midnight'"
                            >
                                Všetko
                            </button>

                            @foreach ($phases as $phase)
                                <button
                                    x-on:click="phase = {{ Js::from($phase) }}"
                                    type="button"
                                    class="shrink-0 rounded-full px-4 py-2 text-sm font-medium whitespace-nowrap transition"
                                    x-bind:class="
                                        phase === {{ Js::from($phase) }}
                                            ? 'bg-midnight text-white'
                                            : 'text-ash hover:text-midnight'
                                    "
                                >
                                    {{ $phase }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="overflow-hidden rounded-2xl border border-midnight/10 bg-white">
                @foreach ($modules as $module)
                    <div
                        class="border-t border-midnight/10 transition first:border-t-0"
                        x-bind:class="
                            phase !== 'all' && phase !== {{ Js::from($module->section) }}
                                ? 'opacity-35'
                                : 'opacity-100'
                        "
                    >
                        <x-domains.module.tile :module="$module" />
                    </div>
                @endforeach
            </div>
        </x-ui.container>
    </section>
@endif
