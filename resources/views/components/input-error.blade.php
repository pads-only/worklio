@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge([
        'class' => '
            mt-2 text-sm text-destructive
            space-y-1
        '
    ]) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-start gap-2">
                <span class="mt-1 h-1.5 w-1.5 rounded-full bg-destructive flex-shrink-0"></span>
                <span>{{ $message }}</span>
            </li>
        @endforeach
    </ul>
@endif