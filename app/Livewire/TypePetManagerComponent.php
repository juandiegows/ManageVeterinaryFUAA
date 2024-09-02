<?php

namespace App\Livewire;

use App\Models\TypePet;
use Livewire\Component;
use Livewire\WithPagination;

class TypePetManagerComponent extends Component
{
    use WithPagination;
    public $filterCount = 10;
    public $search = '';
    public $modalCreate = false;
    public $modalDelete = false;
    public $dataTypePet = [];


    public function render()
    {
        return view('livewire.type-pet-manager-component', [
            "typePets" => $this->loadTypePets()
        ]);
    }

    public function loadTypePets()
    {
        $searchTerm = '%' . $this->search . '%';

        return TypePet::where('name', 'like', $searchTerm)
            ->paginate($this->filterCount);
    }

    public function showAdd()
    {
        $this->reset(['dataTypePet']);
        $this->modalCreate = true;
    }

    public function setTypePetForUpdate(TypePet $typePet)
    {
        $this->dataTypePet = $typePet->toArray();
        $this->modalCreate = true;
    }

    public function store()
    {
        $this->validate(["dataTypePet.name" => "required"], ["required", "El nombre es obligatorio"]);

        $type = new TypePet();
        $type->name = $this->dataTypePet['name'];
        $type->save();
        flash()->success('Se ha agregado correctamente.');

        $this->reset(['dataTypePet', 'modalCreate']);
    }

    public function update()
    {
        $this->validate(["dataTypePet.name" => "required"], ["required"=> "El nombre es obligatorio"]);

        $type =  TypePet::find($this->dataTypePet['id']);
        $type->name = $this->dataTypePet['name'];
        $type->save();
        flash()->success('Se ha actualizado correctamente.');

        $this->reset(['dataTypePet', 'modalCreate']);
    }

    public function deleteTypePet(TypePet $typePet, $confirmed = false)
    {
        if ($confirmed) {
            $typePet->delete();
            flash()->success('Se ha Eliminado correctamente.');

            $this->reset(['dataTypePet', 'modalDelete']);
        } else {
           
            if (count($typePet->pets) > 0) {
                flash()->error('No se puede eliminar porque hay mascotas registradas.');
                return;
            }
            $this->dataTypePet = $typePet->toArray();
            $this->modalDelete = true;
        }
    }
}
