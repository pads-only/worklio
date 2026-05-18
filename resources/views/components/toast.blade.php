@props([
    'type' => 'success',
    'title' => null,
])

@php
    $styles = match ($type) {
        'success' => [
            'wrapper' => 'border-success/20 bg-success-light text-success-dark',
            'iconBg' => 'bg-success/15',
            'icon' => 'text-success',
        ],

        'error' => [
            'wrapper' => 'border-destructive/20 bg-destructive-light text-destructive-dark',
            'iconBg' => 'bg-destructive/15',
            'icon' => 'text-destructive',
        ],

        'warning' => [
            'wrapper' => 'border-warning/20 bg-warning/10 text-warning',
            'iconBg' => 'bg-warning/15',
            'icon' => 'text-warning',
        ],

        default => [
            'wrapper' => 'border-primary/20 bg-primary-50 text-primary-700',
            'iconBg' => 'bg-primary/10',
            'icon' => 'text-primary-500',
        ],
    };
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    x-init="setTimeout(() => show = false, 3500)"
    class="
        fixed top-5 right-5 z-50
        flex w-full max-w-sm items-center justify-center gap-4
        rounded-xl border px-4 py-2 shadow-floating
        backdrop-blur-sm
        {{ $styles['wrapper'] }}
    "
>
    {{-- ICON --}}
    <div class="flex h-10 w-10 items-center justify-center rounded-xl {{ $styles['iconBg'] }}">
        @if ($type === 'success')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $styles['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        @elseif ($type === 'error')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $styles['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        @elseif ($type === 'warning')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $styles['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $styles['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01" />
            </svg>
        @endif
    </div>

    {{-- CONTENT --}}
    <div class="flex-1">
        @if ($title)
            <h3 class="text-sm font-semibold">
                {{ $title }}
            </h3>
        @endif

        <p class="mt-1 text-sm leading-relaxed">
            {{ $slot }}
        </p>
    </div>

    {{-- CLOSE --}}
    <button
        x-on:click="show = false"
        class="text-current/60 transition hover:text-current"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>