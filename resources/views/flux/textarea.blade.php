@blaze(fold: true, unsafe: [
    // flux:with-field props
    'name', 'label', 'badge',
    'description', 'description:trailing',
    'label:badge', 'label:aside', 'label:trailing',
    'error:name', 'error:bag', 'error:message', 'error:icon', 'error:nested', 'error:deep',
])

@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'resize' => 'vertical',
    'invalid' => null,
    'rows' => 4,
])

@php
$classes = Flux::classes()
    ->add('block w-full rounded-xl border p-4 shadow-xs transition focus:outline-hidden disabled:shadow-none')
    ->add('bg-white dark:bg-white/5 dark:disabled:bg-white/[7%]')
    ->add($resize ? 'resize-y' : 'resize-none')
    ->add('text-base text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 sm:text-sm dark:text-white dark:disabled:text-white/40 dark:placeholder-white/30 dark:disabled:placeholder-white/20')
    ->add('border-zinc-200 border-b-zinc-300/80 dark:border-white/20 dark:focus:border-periwinkle dark:focus:ring-2 dark:focus:ring-periwinkle/25')
    ->add('data-invalid:shadow-none data-invalid:border-red-500 dark:data-invalid:border-red-500');

$resizeStyle = match ($resize) {
    'none' => 'resize: none',
    'both' => 'resize: both',
    'horizontal' => 'resize: horizontal',
    'vertical' => 'resize: vertical',
};
@endphp

<flux:with-field :$attributes>
    <textarea
        {{ $attributes->class($classes) }}
        rows="{{ $rows }}"
        style="{{ $resizeStyle }}; {{ $rows === 'auto' ? 'field-sizing: content' : '' }}"
        @isset ($name) name="{{ $name }}" @endisset
        @unblaze(scope: ['name' => $name ?? null, 'invalid' => $invalid ?? false])
        <?php if ($scope['invalid'] || ($scope['name'] && $errors->has($scope['name']))): ?>
        aria-invalid="true" data-invalid
        <?php endif; ?>
        @endunblaze
        data-flux-control
        data-flux-textarea
    >{{ $slot }}</textarea>
</flux:with-field>
