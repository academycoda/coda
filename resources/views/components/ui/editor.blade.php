@php
    $lines = [
        '<span class="text-iris">import</span> { <span class="text-[#B85C5C]">Future</span> } <span class="text-iris">from</span> <span class="text-sage">\'coda-academy\'</span>;',
        '&nbsp;',
        '<span class="text-iris">function</span> <span class="text-[#B85C5C]">Student</span>() {',
        '&nbsp;&nbsp;<span class="text-iris">return</span> (',
        '&nbsp;&nbsp;&nbsp;&nbsp;&lt;<span class="text-[#B85C5C]">Future</span>',
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#A87530]">starts</span>=<span class="text-sage">"09/2026"</span>',
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#A87530]">path</span>=<span class="text-sage">"Developer"</span>',
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#A87530]">with</span>=<span class="text-sage">"AI"</span>',
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#A87530]">mindset</span>=<span class="text-sage">"creative"</span>',
        '&nbsp;&nbsp;&nbsp;&nbsp;/&gt;',
        '&nbsp;&nbsp;);',
        '}<span class="ml-1 -translate-y-px inline-block h-5 w-2 bg-iris align-middle animate-blink" aria-hidden="true"></span>',
        '',
    ];
@endphp

<div
    {{ $attributes->class('overflow-hidden rounded-[20px] border border-midnight/20 bg-white shadow-2xl shadow-midnight/15') }}
    aria-hidden="true"
>
    <div class="flex items-center justify-between border-b border-midnight/10 bg-alabaster px-4 py-3">
        <div class="flex gap-1.5">
            <span class="size-2.5 rounded-full bg-[#E36767]"></span>
            <span class="size-2.5 rounded-full bg-[#E8C24B]"></span>
            <span class="size-2.5 rounded-full bg-[#7CC988]"></span>
        </div>

        <div class="font-mono text-xs text-ash">student.jsx</div>
        <div class="flex items-center gap-1.5 font-mono text-xs text-ash">
            <span class="relative flex size-2">
                <span class="absolute inline-flex size-full animate-ping rounded-full bg-green-500 opacity-75"></span>
                <span class="relative inline-flex size-2 rounded-full bg-green-600"></span>
            </span>
            <span>live</span>
        </div>
    </div>

    <div class="grid grid-cols-[2.5rem_1fr] font-mono text-sm leading-7">
        @foreach ($lines as $line)
            <div class="border-r border-midnight/10 px-2 text-right text-xs text-fog">
                {{ $loop->iteration }}
            </div>
            <div class="px-4 text-midnight">{!! $line !!}</div>
        @endforeach
    </div>

    <div class="border-t border-midnight/10 bg-alabaster px-4 py-3">
        <div class="flex flex-col gap-3 text-xs sm:flex-row sm:items-center sm:justify-between">
            <div class="font-mono text-ash">Learn by building real products.</div>
            <div class="flex flex-wrap gap-2">
                <span class="rounded-full bg-lavender px-2.5 py-1 font-mono text-xs text-iris">small team</span>
                <span class="rounded-full bg-midnight px-2.5 py-1 font-mono text-xs text-white">real feedback</span>
            </div>
        </div>
    </div>
</div>
