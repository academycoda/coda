<footer class="border-t border-midnight/10 bg-parchment">
    <x-ui.container class="pt-12 md:pt-20">
        <div class="grid gap-10 md:grid-cols-[2fr_1fr_1fr_1fr]">
            <div>
                <x-art.logo class="h-9 w-auto" />

                <p class="mt-4 max-w-sm text-ash">
                    Miesto pre mladých ľudí, ktorí chcú rozumieť technológiám a vytvárať vlastné digitálne projekty.
                </p>

                <div class="mt-6">
                    <span
                        class="inline-flex h-6 items-center gap-1.5 rounded-full bg-lavender px-2.5 font-mono text-xs font-bold tracking-[0.02em] text-indigo uppercase"
                    >
                        <x-art.symbol class="size-2.5 fill-iris" />
                        Trnava · SK
                    </span>
                </div>
            </div>

            <div class="space-y-3">
                <div class="font-mono text-xs tracking-widest text-ash uppercase">Akadémia</div>
                <x-domains.navigation.main class="flex flex-col gap-2.5 text-sm text-graphite *:hover:text-iris" />
            </div>

            <div class="space-y-3">
                <div class="font-mono text-xs tracking-widest text-ash uppercase">Kurzy</div>
                <ul class="flex flex-col gap-2.5 text-sm text-graphite">
                    @foreach ($courses as $course)
                        <li class="flex items-center gap-2">
                            @if ($course->opened_at !== null)
                                <a
                                    href="{{ route('courses.show', $course) }}"
                                    class="hover:text-iris"
                                >
                                    {{ $course->title }}
                                </a>
                            @else
                                {{ $course->title }}
                                <span
                                    class="rounded border border-midnight/20 px-1.5 py-0.5 font-mono text-[10px] text-ash"
                                >
                                    SOON
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-3">
                <div class="font-mono text-xs tracking-widest text-ash uppercase">Kontakt</div>
                <x-domains.navigation.socials class="flex flex-col gap-2.5 text-sm text-graphite *:hover:text-iris" />
            </div>
        </div>

        <div class="mt-12 border-t border-midnight/10 pt-6">
            <div class="flex flex-col gap-2 text-ash md:flex-row md:items-center md:justify-between">
                <p class="font-mono text-xs">© 2026 Coda Academy. Všetky práva vyhradené.</p>
                <p class="font-instrument">
                    Crafted by
                    <a
                        href="https://cosamey.com"
                        target="_blank"
                        class="text-indigo"
                    >
                        Cosa Mey
                    </a>
                </p>
            </div>
        </div>
    </x-ui.container>
    <div class="mt-12">
        <x-art.wordmark class="h-auto w-full fill-midnight/15" />
    </div>
</footer>
