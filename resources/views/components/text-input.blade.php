@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => '
            block w-full
            rounded-md
            border border-border
            bg-background
            px-3 py-2
            text-sm text-foreground
            shadow-soft

            placeholder:text-muted-foreground

            focus:border-primary-500

            disabled:opacity-50
            disabled:cursor-not-allowed

            transition ease-in-out duration-150
        '
    ]) }}
>