@php
    $apiKey = config('services.google_maps.key');
    $mapId = config('services.google_maps.map_id');
@endphp

@once
    @vite('resources/js/map.js')
@endonce

<div
    {{ $attributes->class('relative aspect-4/3 overflow-hidden rounded-3xl border border-midnight/20 bg-oat') }}
    data-map
    data-map-key="{{ $apiKey }}"
    data-map-id="{{ $mapId }}"
    data-map-lat="48.376170349730494"
    data-map-lng="17.58673795842987"
    data-map-title="Kreatívne centrum Trnava"
>
    <div
        data-map-canvas
        class="size-full [&_.gm-style-cc]:hidden [&_.gmnoprint]:hidden"
    ></div>

    @unless ($apiKey && $mapId)
        <div class="absolute inset-0 grid place-items-center bg-oat px-6 text-center text-sm text-midnight/70">
            Chýba konfigurácia Google mapy.
        </div>
    @endunless
</div>
