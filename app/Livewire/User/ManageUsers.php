<?php

namespace App\Livewire\User;

use App\Livewire\BaseComponent;
use App\Models\User;
use App\Traits\WithBulkActions;
use App\Traits\WithCachedRows;
use App\Traits\WithPerPagePagination;
use App\Traits\WithSorting;
use Spatie\Permission\Models\Role;

class ManageUsers extends BaseComponent
{
    use WithPerPagePagination;
    use WithCachedRows;
    use WithSorting;
    use WithBulkActions;
    use WithUser;

    protected $listeners = ['deleteConfirm' => 'userDelete', 'deleteCancel' => 'userDeleteCancel'];

    public $user_id;

    public $userIdBeingRemoved=null;

    public $filter = [
        'name'   => '',
        'email'  => '',
    ];

    public function mount()
    {
    }

    public function render()
    {
        $data['roles'] = Role::orderBy('name', 'desc')->get();
        $data['users'] = $this->rows;

        return $this->view('livewire.user.manage-users', $data);
    }

    public function getRowsQueryProperty()
    {
        $query = User::query()
            ->when($this->filter['name'], fn ($q, $name) => $q->where('name', 'like', "%{$name}%"))
            ->when($this->filter['email'], fn ($q, $email) => $q->where('email', 'like', "%{$email}%"));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function search()
    {
        $this->hideOffCanvas();
        $this->resetPage();

        return $this->rows;
    }

    public function resetSearch()
    {
        $this->reset('filter');
        $this->hideOffCanvas();
    }

    public function UserconfirmDelete($contact_id)
    {
        $this->userIdBeingRemoved = $contact_id;
        $this->dispatch('show-delete-notification');
    }

    public function userDeleteCancel()
    {
        $this->userIdBeingRemoved = null;
    }

    public function userDelete()
    {
        if ($this->userIdBeingRemoved != null) {
            $user  = User::findorFail($this->userIdBeingRemoved);
            $user->delete();
            $this->dispatch('deleted', ['message' => 'User deleted successfully']);
        }
    }
}
