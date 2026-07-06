@props([
    'course',
])

<section class="py-20">
    <x-ui.container>
        <div class="grid items-start gap-14 lg:grid-cols-[1.4fr_1fr] lg:gap-20">
            <div>
                <x-ui.heading>
                    <x-slot:kicker>O kurze</x-slot>
                    <x-slot:title>Čo ťa čaká.</x-slot>
                </x-ui.heading>

                <div class="mt-9 max-w-2xl space-y-2 leading-6 text-graphite [&_a]:underline [&_a]:decoration-2">
                    {!! $course->description !!}
                </div>
            </div>

            <aside class="overflow-hidden rounded-2xl border border-midnight/15 bg-white lg:sticky lg:top-28">
                <div class="flex items-center justify-between border-b border-midnight/10 bg-alabaster px-5 py-4">
                    <div class="font-mono text-xs text-ash">výstup_kurzu.md</div>
                    <x-art.symbol class="size-3 fill-periwinkle" />
                </div>

                <div class="max-h-[min(28rem,calc(100vh-12rem))] overflow-y-auto p-6">
                    @foreach ($course->outcomes ?? [] as $outcome)
                        <div
                            class="flex items-center gap-4 not-last:mb-4 not-last:border-b not-last:border-midnight/10 not-last:pb-4"
                        >
                            <div class="flex size-8 shrink-0 items-center justify-center rounded-md bg-lavender">
                                <x-art.icons.huge.badge-check
                                    class="size-5 fill-iris"
                                    aria-hidden="true"
                                />
                            </div>
                            <div>
                                <div class="font-medium text-midnight">{{ $outcome }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>
        </div>
    </x-ui.container>
</section>
