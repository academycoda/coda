<x-layouts.app
    title="{{ $course->meta['title'] }}"
    description="{{ $course->meta['description'] }}"
>
    <x-sections.common.header />

    <main>
        <x-sections.course.hero :course="$course" />

        <x-sections.course.breadcrumb :course="$course" />

        <x-sections.course.overview :course="$course" />

        <x-sections.course.project />

        <x-sections.course.curriculum :modules="$course->modules" />

        <x-sections.course.for-whom />

        <x-sections.course.lectors :lecturer="$course->lecturer" />

        <x-sections.course.faq :course="$course" />

        <x-sections.course.apply :course="$course" />
    </main>

    <x-sections.common.footer />
</x-layouts.app>
