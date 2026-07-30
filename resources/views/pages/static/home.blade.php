<x-layouts.app>
    <x-sections.common.header />

    <main>
        <x-sections.home.hero />

        <x-sections.home.stack />

        <x-sections.home.about />

        <x-sections.home.courses :courses="$courses" />

        <x-sections.home.events />

        <x-sections.home.ai />

        <x-sections.home.location />

        <x-sections.home.faq />

        <x-sections.home.cta />
    </main>

    <x-sections.common.footer />

    @push('footer')
        @vite('resources/js/home.js')
    @endpush
</x-layouts.app>
