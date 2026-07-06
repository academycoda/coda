<section
    id="stack"
    class="overflow-hidden border-y border-midnight/10 bg-oat py-6"
    aria-label="Technológie"
>
    @php
        $items = ['HTML', 'CSS', 'Laravel 13', 'Blade', 'Tailwind CSS', 'Vue 3', 'Composition API', 'Inertia.js', 'Git', 'GitHub', 'React 19', 'AI pair-coding', 'Deploy', 'CI/CD', 'PHP 8.5', 'MySQL'];
    @endphp

    <div class="animate-marquee flex w-max gap-12 px-5 motion-reduce:animate-none">
        @foreach ([...$items, ...$items] as $item)
            <span class="inline-flex items-center gap-3 text-xl text-graphite">
                <x-art.symbol class="size-3 fill-periwinkle" />
                {{ $item }}
            </span>
        @endforeach
    </div>
</section>
