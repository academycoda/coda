<title>{{ ($title ?? '') . ' | Coda Academy' }}</title>

<meta
    name="description"
    content="{{ $description ?? '' }}"
/>

<meta
    name="author"
    content="Cosa Mey"
/>

<meta
    property="og:title"
    content="{{ ($title ?? '') . ' | Coda Academy' }}"
/>

<meta
    property="og:description"
    content="{{ $description ?? '' }}"
/>

<meta
    property="og:type"
    content="website"
/>

<meta
    property="og:site_name"
    content="Coda Academy"
/>

<meta
    property="og:image"
    content="{{ asset('assets/img/open-graph.png') }}"
/>

<meta
    property="og:locale"
    content="{{ app()->getLocale() }}"
/>

<meta
    property="og:url"
    content="{{ url()->current() }}"
/>

<meta
    name="robots"
    content="{{
        app()->isProduction()
            ? (isset($noindex) ? 'noindex' : 'index') . ',' . (isset($nofollow) ? 'nofollow' : 'follow')
            : 'noindex,nofollow'
    }}"
/>
