<x-app-layout>
    
    <x-common.header title="Team Settings">
        <li class="breadcrumb-item">
            <a href="javascript: void(0);">{{ __('Team') }}</a>
        </li>
		<li class="breadcrumb-item">Settings</li>
    </x-common.header>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('teams.update-team-name-form', ['team' => $team])

            @livewire('teams.team-member-manager', ['team' => $team])

            @if (Gate::check('delete', $team) && ! $team->personal_team)
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
