@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-danger dark:text-danger']) }}>{{ $message }}</p>
@enderror
