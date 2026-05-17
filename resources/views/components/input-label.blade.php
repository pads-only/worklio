@props(['value'])

<label {{ $attributes->merge([
    'class' => '
        block text-sm font-medium
        text-foreground
        mb-1
    '
]) }}>
    {{ $value ?? $slot }}

    @if ($attributes->get('required'))
        <span class="text-destructive ml-1">*</span>
    @endif
</label>