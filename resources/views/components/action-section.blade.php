<div {{ $attributes->merge(['class' => 'card']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="card-body">
        <div class="">
            {{ $content }}
        </div>
    </div>
</div>
