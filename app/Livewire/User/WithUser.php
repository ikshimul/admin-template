<?php

namespace App\Livewire\User;

use App\Models\User;
use Exception;

trait WithUser
{
    public $name;

    public $email;

    public $role;

    public $active = true;

    public $password;

    public function openNewUserModal()
    {
        $this->resetErrorBag();
        $this->reset();
        $this->dispatch('openNewUserModal');
    }

    public function openEditUserModal($user_id)
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->user_id = $user_id;

        $user           = User::with('roles')->findOrFail($user_id);
        $this->name     = $user->name;
        $this->email    = $user->email;
        $this->role     = $user->roles->count() > 0 ? $user->roles[0]->id : null;
        $this->active   = $user->is_active;
        $this->dispatch('openNewUserModal');
    }

    public function submit()
    {
        $rules = [
            'name'      => 'required',
            'role'      => 'required',
        ];
        if (! $this->user_id) {
            $rules['email']    = 'required|email|unique:users,email';
            $rules['password'] = 'required';
        }
        $messages = [
            'name.required'      => 'Name required',
            'email.required'     => 'Email required',
            'password.required'  => 'Password required',
            'role.required'      => 'Role required',
        ];

        $this->validate($rules, $messages);

        if (! $this->user_id) {
            $this->save();
        } else {
            $this->update();
        }

        $this->reset();
        $this->hideModal();
    }

    public function save()
    {
        try {
            $data['name']       = $this->name;
            $data['email']      = $this->email;
            $data['password']   = bcrypt($this->password);
            $data['is_active']  = $this->active;
            $user               = User::create($data);
            $user->roles()->attach([$this->role]);
            $this->dispatch('notify', ['type' => 'success', 'title' => 'Active', 'message' => 'User created successfully']);
        } catch (Exception $ex) {
            $this->dispatch('notify', ['type' => 'error', 'title' => 'Active', 'message' => $ex->getMessage()]);
        }
    }

    public function update()
    {
        try {
            $user             = User::find($this->user_id);
            $user->name       = $this->name;
            $user->is_active  = $this->active;
            $user->save();
            $user->roles()->sync([$this->role]);
            $this->dispatch('notify', ['type' => 'success', 'title' => 'Active', 'message' => 'User updated successfully']);
        } catch (Exception $ex) {
            $this->dispatch('notify', ['type' => 'error', 'title' => 'Active', 'message' => $ex->getMessage()]);
        }
    }
}
