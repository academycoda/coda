@props([
    'course',
])

<div class="border-y border-midnight/10">
    <x-ui.container class="py-3.5">
        <nav
            class="flex items-center gap-2.5 font-mono text-xs text-fog"
            aria-label="Navigácia"
        >
            <a
                class="text-ash"
                href="{{ route('home') }}"
            >
                coda academy
            </a>
            <span aria-hidden="true">/</span>
            <a
                class="text-ash"
                href="{{ route('home') }}#courses"
            >
                kurzy
            </a>
            <span aria-hidden="true">/</span>
            <span class="text-midnight">{{ $course->slug }}</span>
        </nav>
    </x-ui.container>
</div>
