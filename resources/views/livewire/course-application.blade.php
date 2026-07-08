<div class="dark relative z-20 w-full">
    @if ($submitted)
        <div
            class="relative w-full rounded-2xl border border-periwinkle/40 bg-periwinkle/10 px-6 py-10 text-center sm:px-8 lg:py-12"
        >
            <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-periwinkle">
                <x-art.icons.huge.tick class="size-6 fill-white" />
            </div>
            <h3 class="mt-6 text-3xl font-medium tracking-normal">
                Ďakujeme, {{ $this->first_name ?: 'a vidíme sa' }}!
            </h3>
            <p class="mt-3 leading-7 text-white/70">Prihláška dorazila. Ozveme sa ti emailom s ďalšími krokmi.</p>
            <flux:button
                variant="outline"
                href="{{ route('home') }}"
                class="mt-6 border-white/30! text-white! hover:bg-white/10!"
            >
                Späť na hlavnú stránku
            </flux:button>
        </div>
    @else
        <form
            x-data="{
                birthDate: @js($form->birth_date),
                get requiresGuardian() {
                    if (! this.birthDate) {
                        return false
                    }

                    const [year, month, day] = this.birthDate.split('-').map(Number)
                    const today = new Date()
                    let age = today.getFullYear() - year
                    const monthDifference = today.getMonth() + 1 - month

                    if (
                        monthDifference < 0 ||
                        (monthDifference === 0 && today.getDate() < day)
                    ) {
                        age--
                    }

                    return age < 18
                },
            }"
            wire:submit="submit"
            class="relative grid gap-3 rounded-2xl border border-white/10 bg-white/4 p-5 sm:p-6 md:grid-cols-2 md:p-7"
        >
            <flux:input
                wire:model="form.first_name"
                label="Meno"
                placeholder="Janka"
            />

            <flux:input
                wire:model="form.last_name"
                label="Priezvisko"
                placeholder="Nováková"
            />

            <flux:input
                wire:model="form.email"
                label="Email"
                type="email"
                placeholder="janka@email.sk"
            />

            <flux:input
                wire:model="form.birth_date"
                x-model="birthDate"
                label="Dátum narodenia"
                type="date"
            />

            <div class="md:col-span-2">
                <flux:input
                    wire:model="form.school"
                    label="Stredná škola"
                    placeholder="Gymnázium J. Hollého, Trnava"
                />
            </div>

            <div class="md:col-span-2">
                <flux:textarea
                    wire:model="form.bio"
                    label="Niečo o tebe"
                    placeholder="Napíš nám pár viet o sebe. Čo ťa priviedlo k programovaniu, či už máš nejaké skúsenosti, čo rád/rada robíš na počítači a čo by si sa chcel(a) naučiť."
                    rows="6"
                    class="min-h-36"
                />
            </div>

            <div
                x-show="requiresGuardian"
                class="grid gap-3 rounded-xl border border-periwinkle/30 bg-periwinkle/8 p-4 sm:grid-cols-2 md:col-span-2"
                x-cloak
            >
                <div class="sm:col-span-2">
                    <h4 class="font-mono text-xs font-medium tracking-widest text-white/70 uppercase">
                        Zákonný zástupca
                    </h4>
                    <p class="mt-2 font-mono text-xs leading-5 text-white/50">
                        V prípade, že ťa vyberieme, budeme potrebovať súhlas zákonného zástupcu s účasťou na kurze. Len
                        formalita.
                    </p>
                </div>

                <div class="md:col-span-2">
                    <flux:input
                        wire:model="form.guardian_name"
                        label="Meno"
                        placeholder="Mária Nováková"
                    />
                </div>

                <flux:input
                    wire:model="form.guardian_email"
                    label="Email"
                    type="email"
                    placeholder="rodic@email.sk"
                />

                <flux:input
                    wire:model="form.guardian_phone"
                    label="Telefón"
                    type="tel"
                    placeholder="+421 900 000 000"
                />
            </div>

            <div class="flex flex-col items-start gap-3 md:col-span-2">
                <flux:field variant="inline">
                    <flux:checkbox
                        wire:model="form.consent"
                        accent="periwinkle"
                    />
                    <flux:label class="font-sans text-sm tracking-normal text-white/70 normal-case">
                        Súhlasím so spracovaním údajov pre účely výberu do kurzu.
                    </flux:label>
                    <flux:error name="form.consent" />
                </flux:field>

                <flux:field variant="inline">
                    <flux:checkbox
                        wire:model="form.marketing_consent"
                        accent="periwinkle"
                    />
                    <flux:label class="font-sans text-sm tracking-normal text-white/70 normal-case">
                        Chcem byť informovaný/á o budúcich kurzoch a podujatiach.
                    </flux:label>
                    <flux:error name="form.marketing_consent" />
                </flux:field>

                <div class="font-mono text-xs leading-5 text-white/50">
                    Údaje nikomu nepredáme a po vyhodnotení ich skartujeme.
                </div>

                <flux:button
                    type="submit"
                    variant="primary"
                    wire:loading.attr="disabled"
                    class="shrink-0"
                >
                    <span wire:loading.remove>Odoslať prihlášku</span>
                    <span wire:loading>Odosielam...</span>

                    <x-slot:iconTrailing>
                        <x-art.icons.huge.arrow-right class="size-5 fill-current" />
                    </x-slot>
                </flux:button>
            </div>
        </form>
    @endif
</div>
