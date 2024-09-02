<?php

namespace App\Livewire;

use App\Actions\Pet\PetCreate;
use App\Actions\Pet\PetUpdate;
use App\Models\BreedPet;
use App\Models\GenderPet;
use App\Models\Pet;
use App\Models\PetVaccine;
use App\Models\TypePet;
use App\Models\User;
use App\Models\Vaccine;
use App\validations\PetValidation;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PetManagerComponent extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $filterCount = 10;
    public $typePets;
    public $genders;
    public $breeds;
    public $search = '';
    public $users;
    public $vaccines;
    public $vaccinesRecord;
    public $modelCreate = false;
    public $modelDelete = false;
    public $modelVaccinate = false;
    public $modalRecordVaccinate = false;

    #[Validate('image|max:1024')]
    public $photo;
    public $dataPet = [];
    public $vaccinateId = null;
    public function mount()
    {
        $this->loadTypePets();
        $this->loadGenders();
        $this->loadBreeds();
        $this->loadUsers();
    }


    public function loadVaccines()
    {
        $this->vaccines = Vaccine::whereHas('TypePetVaccine', function ($query) {
            $query->where('type_pet_id', $this->dataPet['type_pet_id']);
        })->get();
    }


    public function render()
    {
        return view(
            'livewire.pet-manager-component',
            [
                'pets' => $this->loadPets()
            ]
        );
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

        return  Pet::select('pets.*')
            ->where(function ($query) use ($searchTerm) {
                $query->where('pets.name', 'like', $searchTerm);
            })
            ->orderBy('pets.name')
            ->paginate($this->filterCount);
    }


    public function loadUsers()
    {

        $this->users = User::where('role_id', 2)->get();
    }


    public function vaccinateRecord(Pet $pet)
    {
        $this->dataPet = $pet->toArray();
        $this->vaccinesRecord = $pet->petVaccines;
        $this->modalRecordVaccinate = true;
    }

    public function vaccinate(Pet $pet, $confirmed = false)
    {
        if ($confirmed) {
            $this->validate(["vaccinateId" => "required"], ["required" => "Debe seleccionar una  vacuna"]);
            $vaccine = new PetVaccine();
            $vaccine->vaccine_id = $this->vaccinateId;
            $vaccine->pet_id = $this->dataPet['id'];
            $vaccine->save();
            flash()->success('Se ha aplicado la vacuna correctamente.');
            $this->reset(['dataPet', 'modelVaccinate']);
        } else {
            $this->dataPet = $pet->toArray();
            $this->loadVaccines();
            $this->modelVaccinate = true;
        }
    }

    public function deletePet(Pet $pet, $confirmed = false)
    {
        try {

            if ($confirmed) {
                $pet->delete();
                flash()->success('Se ha eliminado correctamente.');
            
                $this->reset(['dataPet', 'modelDelete']);
            } else {
                $this->dataPet = $pet->toArray();
                $this->modelDelete = true;
            }
        } catch (\Throwable $th) {
            $this->reset(['dataPet', 'modelDelete']);
            flash()->error("Ha ocurrido un error" . $th->getMessage());
            DB::rollBack();
        }
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
      
            $this->reset(['dataPet', 'modelCreate']);
        } catch (\Throwable $th) {
            $this->reset(['dataPet', 'modelCreate']);
            flash()->error("Ha ocurrido un error" . $th->getMessage());
            DB::rollBack();
        }
    }
}
