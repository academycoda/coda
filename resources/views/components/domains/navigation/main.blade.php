<nav {{ $attributes }}>
    <a href="{{ route('home') . '#about' }}">O akadémii</a>
    <a
        class="text-midnight"
        href="{{ route('home') . '#courses' }}"
    >
        Kurzy
    </a>
    <a href="{{ route('home') . '#events' }}">Podujatia</a>
    <a href="{{ route('home') . '#location' }}">Kde nás nájdeš</a>
    <a href="{{ route('home') . '#faq' }}">FAQ</a>
</nav>
