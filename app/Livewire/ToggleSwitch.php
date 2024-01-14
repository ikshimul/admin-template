<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;

class ToggleSwitch extends BaseComponent
{
    public Model $model;

    public $primaryid;

    public $name;

    public $field;

    public $status;

    public $uniqueId;

    public function mount()
    {
        $this->status   = (bool) $this->model->getAttribute($this->field);
        $this->uniqueId = uniqid();
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();

        if ($value == false) {
            $this->dispatch('notify', ['type' => 'warning', 'title' => 'Inactive', 'message' => $this->name . ' Inactive']);
        } else {
            $this->dispatch('notify', ['type' => 'success', 'title' => 'Active',  'message' => $this->name . ' Active']);
        }
    }

    public function render()
    {
        return view('livewire.toggle-switch');
    }

    public function updated($field, $value) {}
}
