<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserManagerComponent extends Component
{

    public $users;
    public $search = '';

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $searchTerm = '%' . $this->search . '%';

        $this->users = User::select('users.*')
            ->join('roles', 'users.role_id', '=', 'roles.id')  // Asegúrate de que 'role_id' es la columna en 'users' que hace referencia a 'roles'
            ->where(function ($query) use ($searchTerm) {
                $query->where('users.name', 'like', $searchTerm)
                    ->orWhere('users.email', 'like', $searchTerm)
                    ->orWhere('roles.name', 'like', $searchTerm);
            })
            ->orderBy('users.name')
            ->get();
    }

    public function updatedSearch()
    {
        $this->loadUsers();
    }

    public function render()
    {
        return view('livewire.user-manager-component');
    }
}
