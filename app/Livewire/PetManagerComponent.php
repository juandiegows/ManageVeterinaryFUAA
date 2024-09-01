<?php

namespace App\Livewire;

use App\Actions\Pet\PetCreate;
use App\Actions\Pet\PetUpdate;
use App\Models\BreedPet;
use App\Models\GenderPet;
use App\Models\Pet;
use App\Models\TypePet;
use App\Models\User;
use App\validations\PetValidation;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PetManagerComponent extends Component
{

    use WithFileUploads;
    public $pets;
    public $typePets;
    public $genders;
    public $breeds;
    public $search = '';
    public $users;
    public $modelCreate = false;

    #[Validate('image|max:1024')]
    public $photo;
    public $dataPet = [];
    public function mount()
    {
        $this->loadPets();
        $this->loadTypePets();
        $this->loadGenders();
        $this->loadBreeds();
        $this->loadUsers();
    }

    public function render()
    {
        return view('livewire.pet-manager-component');
    }


    public function showAdd()
    {
        $this->reset(['dataPet']);
        $this->modelCreate = true;
    }


    public function loadTypePets()
    {
        $this->typePets = TypePet::all();
    }


    public function loadGenders()
    {
        $this->genders = GenderPet::all();
    }


    public function loadBreeds()
    {
        $this->breeds = BreedPet::where('type_pet_id', '=', $this->dataPet['type_pet_id'] ?? 0)->get();
    }

    public function updatedDataPetTypePetId($value)
    {
        $this->loadBreeds();
    }


    public function loadPets()
    {
        $searchTerm = '%' . $this->search . '%';

        $this->pets = Pet::select('pets.*')
            ->where(function ($query) use ($searchTerm) {
                $query->where('pets.name', 'like', $searchTerm);
            })
            ->orderBy('pets.name')
            ->get();
    }


    public function loadUsers()
    {

        $this->users = User::where('role_id', 2)->get();
    }


    public function store()
    {
        $this->validate(PetValidation::getRules('dataPet', $this->dataPet['id'] ?? ''), PetValidation::getMessages());
        try {

            DB::beginTransaction();
            $response =  PetCreate::create($this->dataPet);
            if ($response->errorInfo) {
                DB::rollBack();
                flash()->error('No se pudo guardar  la mascota.');
            }
            DB::commit();
            flash()->success('Se ha agregado correctamente.');
            $this->loadPets();
            $this->reset(['dataPet', 'modelCreate']);
        } catch (\Throwable $th) {
            $this->reset(['dataPet', 'modelCreate']);
            flash()->error("Ha ocurrido un error" . $th->getMessage());
            DB::rollBack();
        }
    }

    public function setPetForUpdate(Pet $pet)
    {
        $this->reset(['dataPet', 'modelCreate']);
        $this->dataPet = $pet->toArray();
        $this->modelCreate = true;
    }

    
    public function update()
    {
        $this->validate(PetValidation::getRules('dataPet', $this->dataPet['id'] ?? ''), PetValidation::getMessages());
        try {

            DB::beginTransaction();
            $response =  PetUpdate::create($this->dataPet);
            if ($response->errorInfo) {
                DB::rollBack();
                flash()->error('No se pudo actualizar  la mascota.');
            }
            DB::commit();
            flash()->success('Se ha actualizado correctamente.');
            $this->loadPets();
            $this->reset(['dataPet', 'modelCreate']);
        } catch (\Throwable $th) {
            $this->reset(['dataPet', 'modelCreate']);
            flash()->error("Ha ocurrido un error" . $th->getMessage());
            DB::rollBack();
        }
    }

}
