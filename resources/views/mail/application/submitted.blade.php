<x-mail::message>
# Prihláška dorazila

Ahoj, {{ $application->first_name }},

ďakujeme za prihlášku do kurzu **{{ $application->course->title }}**. Máme ju v systéme. Prihlášky prechádzajú krátkym výberovým procesom, preto jej odoslanie ešte neznamená prijatie do kurzu. O výsledku ti dáme vedieť emailom.

## Čo bude nasledovať

- prejdeme si tvoju prihlášku,
- dáme ti vedieť, či potrebujeme doplniť ďalšie informácie,
- oznámime ti, či sme ťa do kurzu vybrali,
- ak áno, pošleme ti detailné informácie k jeho začiatku.

<x-mail::panel>
## Prihláška

Meno: {{ $application->name }}<br />
Kurz: **{{ $application->course->title }}**<br />
Email: {{ $application->email }}<br />
Škola: {{ $application->school }}
</x-mail::panel>

Ak si prihlášku neposielal/a ty, môžeš tento email ignorovať.

<x-mail::button :url="route('courses.show', $application->course)">
Pozrieť detail kurzu
</x-mail::button>

Tešíme sa,<br>
**Coda Academy**
</x-mail::message>
