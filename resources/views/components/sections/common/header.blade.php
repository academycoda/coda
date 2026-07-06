<header
    x-data="{ open: false }"
    class="sticky top-0 z-30 border-b border-midnight/10 bg-parchment/60 backdrop-blur"
>
    <x-ui.container class="py-4">
        <div class="grid grid-cols-2 items-center gap-5 md:grid-cols-5">
            <div>
                <a
                    href="{{ route('home') }}"
                    aria-label="Späť na úvod"
                >
                    <x-art.logo
                        class="h-5 w-auto fill-midnight md:h-6"
                        aria-label="Logo Coda Academy"
                    />
                </a>
            </div>
            <div class="col-span-3 justify-self-center max-md:hidden">
                <x-domains.navigation.main class="hidden items-center gap-9 text-sm font-medium text-ash md:flex" />
            </div>
            <div class="hidden justify-self-end md:block">
                <flux:button
                    size="sm"
                    variant="primary"
                    href="{{ route('home') . '#courses' }}"
                >
                    Prihlásiť sa
                    <x-slot:iconTrailing>
                        <x-art.icons.huge.arrow-right class="size-5" />
                    </x-slot>
                </flux:button>
            </div>
            <div class="justify-self-end md:hidden">
                <flux:button
                    size="sm"
                    variant="filled"
                    x-on:click="open = !open"
                    x-bind:aria-expanded="open"
                    aria-controls="mobile-navigation"
                >
                    <x-art.icons.huge.menu
                        x-show="!open"
                        class="size-5"
                    />
                    <x-art.icons.huge.cancel
                        x-show="open"
                        class="size-5"
                        x-cloak
                    />
                </flux:button>
            </div>
        </div>

        <div
            x-show="open"
            x-transition.opacity.duration.150ms
            class="absolute top-full left-0 z-20 w-full md:hidden"
            x-cloak
        >
            <div class="border-y border-midnight/10 bg-parchment p-4 backdrop-blur-md">
                <x-domains.navigation.main class="flex flex-col gap-3 font-medium text-ash *:px-3 *:py-2" />

                <flux:button
                    variant="primary"
                    href="{{ route('home') . '#courses' }}"
                    class="w-full"
                >
                    Prihlásiť sa
                    <x-slot:iconTrailing>
                        <x-art.icons.huge.arrow-right class="size-5" />
                    </x-slot>
                </flux:button>
            </div>
        </div>
    </x-ui.container>
</header>
