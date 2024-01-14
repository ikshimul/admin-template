<x-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-md-6">
            <x-label value="{{ __('Team Owner') }}" />
            <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <img class="rounded-circle avatar-lg" src="{{ $team->owner->profile_photo_url }}" alt="{{ $team->owner->name }}">
                </div>
                <div class="flex-grow-1 mt-2">
                    <h5>{{ $team->owner->name }}</h5>
                    <p class="mb-0">{{ $team->owner->email }}</p>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="col-md-12 sm:col-md-12 mt-3">
            <x-label for="name" value="{{ __('Team Name') }}" />

            <x-input id="name"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model="state.name"
                        :disabled="! Gate::check('update', $team)" />

            <x-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
    <div class="col-md-6">
        <x-slot name="actions">
            <x-button>
                {{ __('Save') }}
            </x-button>
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
        </x-slot>
    <div>
    @endif
</x-form-section>
