@props(['active' => false])

@php
$classes = $active
    ? '
        bg-primary-500
        text-muted
        hover:bg-primary/15
        hover:border-primary/40
    '
    : '
        bg-surface
        border-border
        text-slate-700
        hover:bg-muted
        hover:border-primary-200
    ';
@endphp

<a {{ $attributes->merge([
    'class' => '
        inline-flex items-center px-4 py-2
        border
        rounded-md
        font-semibold text-xs
        uppercase tracking-widest
        shadow-soft
        focus:outline-none
        focus:ring-2
        focus:ring-primary-500
        focus:ring-offset-2
        disabled:opacity-25
        transition ease-in-out duration-150
    ' . $classes
]) }}>
    {{ $slot }}
</a>