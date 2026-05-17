<button {{ $attributes->merge([
    'type' => 'button',
    'class' => '
        inline-flex items-center px-4 py-2
        bg-surface
        border border-border
        rounded-md
        font-semibold text-xs
        text-slate-700
        uppercase tracking-widest
        shadow-soft
        hover:bg-muted
        hover:border-primary-200
        focus:outline-none
        focus:ring-2
        focus:ring-primary-500
        focus:ring-offset-2
        disabled:opacity-25
        transition ease-in-out duration-150
    '
]) }}>
    {{ $slot }}
</button>