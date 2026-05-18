@php
    $toasts = [
        'success' => 'Success',
        'error' => 'Error',
        'warning' => 'Warning',
        'info' => 'Notice',
    ];
@endphp

<div class="fixed top-5 right-5 z-50 space-y-3">
    @foreach ($toasts as $type => $title)
        @if (session($type))
            <x-toast
                :type="$type"
                :title="$title"
            >
                {{ session($type) }}
            </x-toast>
        @endif
    @endforeach
</div>