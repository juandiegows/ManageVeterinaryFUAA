<?php

namespace App\Livewire;

use App\Models\BreedPet;
use App\Models\TypePet;
use Livewire\Component;
use Livewire\WithPagination;

class BreedManagerComponent extends Component
{
    use WithPagination;
    public $filterCount = 10;
    public $search = '';
    public $modalCreate = false;
    public $modalDelete = false;
    public $dataBreedPet = [];
    public $typePets = [];


    public function mount(){
        $this->loadTypePets();
    }
    public function render()
    {
        return view(
            'livewire.breed-manager-component',
            [
                "breedPets" => $this->loadBreedPets()
            ]
        );
    }

    public function showAdd()
    {
        $this->reset(['dataBreedPet']);
        $this->modalCreate = true;
    }


    public function loadTypePets()
    {
        $this->typePets =  TypePet::all();
    }

    public function loadBreedPets()
    {
        $searchTerm = '%' . $this->search . '%';

        return BreedPet::where('name', 'like', $searchTerm)
            ->paginate($this->filterCount);
    }

    public function setBreedPetForUpdate(BreedPet $breedPet)
    {
        $this->dataBreedPet = $breedPet->toArray();
        $this->modalCreate = true;
    }


    public function store()
    {
        $this->validate(["dataBreedPet.name" => "required","dataBreedPet.type_pet_id" => "required"],
         ["dataBreedPet.name.required"=> "El nombre es obligatorio",
         "dataBreedPet.type_pet_id.required"=> "El tipo es obligatorio"]);

        $type = new BreedPet();
        $type->name = $this->dataBreedPet['name']; 
        $type->type_pet_id = $this->dataBreedPet['type_pet_id']; 
        $type->save();
        flash()->success('Se ha agregado correctamente.');

        $this->reset(['dataBreedPet', 'modalCreate']);
    }

    
    public function update()
    {
        $this->validate(["dataBreedPet.name" => "required","dataBreedPet.type_pet_id" => "required"],
         ["dataBreedPet.name.required"=> "El nombre es obligatorio",
         "dataBreedPet.type_pet_id.required"=> "El tipo es obligatorio"]);

        $type =  BreedPet::find( $this->dataBreedPet['id']);
        $type->name = $this->dataBreedPet['name']; 
        $type->type_pet_id = $this->dataBreedPet['type_pet_id']; 
        $type->save();
        flash()->success('Se ha actualizado correctamente.');

        $this->reset(['dataBreedPet', 'modalCreate']);
    }
}
