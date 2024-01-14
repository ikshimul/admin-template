<x-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Team Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new team to collaborate with others on projects.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-label value="{{ __('Team Owner') }}" />
            <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <img class="rounded-circle avatar-lg" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">
                </div>
                <div class="flex-grow-1 mt-2">
                    <h5>{{ $this->user->name }}</h5>
                    <p class="mb-0">{{ $this->user->email }}</p>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4 mt-3">
            <x-label for="name" value="{{ __('Team Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" autofocus />
            <x-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>
