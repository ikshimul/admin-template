<div>
    @section('page-title')
        Manage Users
    @endsection


    @section('header')
    <x-common.header title="Manage Users">
        <li class="breadcrumb-item">
            <a href="javascript: void(0);">User Management</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
    </x-common.header>
    @endsection

    <x-action-box>
        <x-slot name="left">
           <div>
                @if(count($selected) > 0)
                <button class="btn btn-danger"><i class="fa fa-trash me-2"></i>Delete</button>
                @endif
            </div>
            <button wire:click="openNewUserModal()" type="button" class="btn waves-effect btn-primary">
                <i class="fa fa-plus me-2"></i> New User
            </button>
            @include('livewire.user._add_update_user')
        </x-slot>
        <x-slot name="right">
            <div class="d-flex justify-content-between">
                <x-form.select id="perPage" wire:model.live="perPage">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </x-form.select>

                <div class="ms-2">
                    <button
                        class="btn btn-primary"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasFilter"
                        aria-controls="offcanvasFilter">
                        <i class="fa fa-filter pe-2"></i> Search
                    </button>
                    <x-offcanvas id="offcanvasFilter" size="sm" title="Search">
                        <form>
                            <x-form.input id="txt_name_filter" wire:model="filter.name" placeholder="{{ __('Name') }}" />
                            <x-form.input id="txt_email_filter" wire:model="filter.email" placeholder="{{ __('Email') }}" /> 
                            <button type="submit" wire:click.prevent="search" class="btn btn-primary">Search</button>
                            <button type="button" wire:click.prevent="resetSearch" class="btn btn-link">Reset</button>
                        </form>
                    </x-offcanvas>
                </div>
            </div>

        </x-slot>

    </x-action-box>

    <x-table.table>
        <x-slot name="head">
            <tr>
			   <!-- <th width="50px">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" wire:model="selectPage" id="ck_check_all">
						<label class="form-check-label" for="ck_check_all"></label>
					</div>
				</th> -->
                <x-table.th>Name</x-table.th>
                <x-table.th>Email</x-table.th>
                <x-table.th>Role</x-table.th>
                <x-table.th style="width: 98px">Status</x-table.th>
                <x-table.th style="width: 90px">Action</x-table.th>
            </tr>

            @if ( count($selected) > 0 )
            <tr>
                <th colspan="6" class="text-center font-weight-normal text-muted">
                    @unless ($selectAll)
                    <div>
                        <span>
                            You have selected <strong>{{ count($selected) }}</strong> users,</span>
                        <span> do you want to select all <strong>{{ $users->total() }}</strong>?
                        </span>
                        <button wire:click="selectAll" class="ml-1 btn btn-link">Select All</button>
                    </div>
                    @else
                    <span>You are currently selecting all <strong>{{ $users->total() }}</strong> users.</span>
                    @endif
                </th>
            </tr>
            @endif
        </x-slot>
        <x-slot name="body">
            @forelse($users as $user)
            <tr wire:key="{{$user->id}}">

                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @forelse ($user->roles as $role)
                        <span class="badge badge-soft-primary">{{ $role->name }}</span>
                    @empty
                        ---
                    @endforelse
                </td>
                <td>
                    @if($user->id == auth()->user()->id)
                    <span class="badge badge-soft-primary">Active</span>
                    @else
                       @livewire('toggle-switch', ['model'=>$user, 'field'=>'is_active','name'=>$user->name], key($user->id))
                    @endif
                </td>
                <td>
                    <button type="button"  wire:click="openEditUserModal({{ $user->id }})"  class="btn btn-primary btn-sm"> <i class="fa fa-edit fa-color-primary"></i> </button>
                    @if($user->id == auth()->user()->id)

                    @else
                      <a wire:click="UserconfirmDelete({{ $user->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No Records Found!</td>
            </tr>
            @endforelse
        </x-slot>
    </x-table.table>
    <div class="row">
        <div class="col-sm-12 col-md-5"><?php echo pagination_stats_text($users); ?></div>
        <div class="col-sm-12 col-md-7">{{ $users->links() }}</div>
    </div>
    @include('livewire.x-loading')
	<x-notify/>
</div>

