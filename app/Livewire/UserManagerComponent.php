<?php

namespace App\Livewire;

use App\Actions\User\UserCreate;
use App\Models\Role;
use App\Models\User;
use App\validations\UserValidation;
use Flasher\Prime\Notification\NotificationInterface;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserManagerComponent extends Component
{

    public $users;
    public $search = '';
    public $modelCreate = false;
    public $dataUser = [
        'role_id' => 1
    ];
    public $roles;


    public function mount()
    {
        $this->loadUsers();
        $this->loadRoles();
    }

    public function render()
    {
        return view('livewire.user-manager-component');
    }

    public function close()
    {
        $this->modelCreate = false;
    }

    public function loadRoles()
    {
        $this->roles = Role::all();
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


    public function showAdd()
    {
        $this->reset(['dataUser']);
        $this->modelCreate = true;
    }

    public function store()
    {  
        $this->validate(UserValidation::getRules('dataUser', $this->dataUser['id'] ?? ''), UserValidation::getMessages());
        try {
         
            DB::beginTransaction();
            $response =  UserCreate::create($this->dataUser);
            if ($response->errorInfo) {
                DB::rollBack();
                flash()->error('No se pudo guardar el formulario.');
            }
            DB::commit();
            flash()->success('Se ha agregado correctamente.');
            $this->loadUsers();
            $this->reset(['dataUser', 'modelCreate']);
        } catch (\Throwable $th) {
            $this->errorAlert("Ha ocurrido un error", $th->getMessage());
            DB::rollBack();
        }


    }
}
