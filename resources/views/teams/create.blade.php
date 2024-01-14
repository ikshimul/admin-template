<x-app-layout>
    <x-common.header title="Team Create">
        <li class="breadcrumb-item">
            <a href="javascript: void(0);">{{ __('Team') }}</a>
        </li>
		<li class="breadcrumb-item">{{ __('Create') }}</li>
    </x-common.header>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('teams.create-team-form')
        </div>
    </div>
</x-app-layout>
