<?php

namespace App\Livewire;

use App\Actions\Vaccine\VaccineCreate;
use App\Models\TypePet;
use App\Models\Vaccine;
use App\validations\VaccineValidation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class VaccineManagerComponent extends Component
{

    use WithPagination;
    public $types = [];
    public $dataVaccine = [
        'typePets' => []
    ];
    public $modelCreate = false;
    public $modelDelete = false;
    public $typePets;
    public $filterCount = 10;

    public function mount()
    {
        $this->loadTypePets();
    }

    public function render()
    {
        return view('livewire.vaccine-manager-component', [
            'vaccines' => $this->loadVaccines(),
        ]);
    }


    public function loadVaccines()
    {
        return Vaccine::orderByDesc('created_at')
            ->paginate($this->filterCount);
    }


    public function showAdd()
    {
        $this->reset(['dataVaccine']);
        $this->modelCreate = true;
    }

    public function setVaccineForUpdate(Vaccine $vaccine)
    {
        $this->reset(['dataVaccine', 'modelCreate']);
        $this->dataVaccine = $vaccine->toArray();
        $this->dataVaccine['typePets'] = $vaccine->typePets()->pluck('type_pet_id')->toArray();
        $this->types = $vaccine->typePets()->pluck('type_pet_id')->toArray();
        $this->modelCreate = true;
    }

    public function inVaccine($element)
    {

        return in_array($element, $this->types);
    }

    public function loadTypePets()
    {
        $this->typePets = TypePet::all();
    }

    function toggleElement($element)
    {
        if (in_array($element, $this->dataVaccine['typePets'])) {
            $this->dataVaccine['typePets'] = array_diff($this->dataVaccine['typePets'], [$element]);
        } else {
            $this->dataVaccine['typePets'][] = $element;
        }
    }


    public function deleteVaccine(Vaccine $vaccine, $confirmed = false)
    {
        try {

            if ($confirmed) {
                $vaccine->TypePetVaccine()->delete();
                $vaccine->delete();
                flash()->success('Se ha eliminado correctamente.');
                
                $this->reset(['dataVaccine', 'modelDelete']);
            } else {
                $this->dataVaccine = $vaccine->toArray();
                $this->modelDelete = true;
            }
        } catch (\Throwable $th) {
            $this->reset(['dataVaccine', 'modelDelete']);
            flash()->error("Ha ocurrido un error" . $th->getMessage());
            DB::rollBack();
        }
    }


    public function store()
    {
        $this->validate(VaccineValidation::getRules('dataVaccine', $this->dataVaccine['id'] ?? ''), VaccineValidation::getMessages());
        try {

            DB::beginTransaction();
            $response =  VaccineCreate::create($this->dataVaccine);
            if ($response->errorInfo) {
                DB::rollBack();
                flash()->error('No se pudo guardar la vacuna.');
            }
            $response =   VaccineCreate::addTypePet($response, $this->dataVaccine['typePets']);
            if ($response->errorInfo) {
                DB::rollBack();
                flash()->error('No se pudo guardar la vacuna.');
            }
            DB::commit();
            flash()->success('Se ha agregado correctamente.');

            $this->reset(['dataVaccine', 'modelCreate']);
        } catch (\Throwable $th) {
            $this->reset(['dataVaccine', 'modelCreate']);
            flash()->error("Ha ocurrido un error" . $th->getMessage());
            DB::rollBack();
        }
    }
}
