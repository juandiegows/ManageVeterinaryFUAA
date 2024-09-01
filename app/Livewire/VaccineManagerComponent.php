<?php

namespace App\Livewire;

use App\Actions\Vaccine\VaccineCreate;
use App\Models\TypePet;
use App\Models\Vaccine;
use App\validations\VaccineValidation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VaccineManagerComponent extends Component
{
    public $vaccines;
    public $dataVaccine = [
        'typePets' => []
    ];
    public $modelCreate = false;
    public $typePets;

    public function mount()
    {
        $this->loadVaccines();
        $this->loadTypePets();
    }

    public function render()
    {
        return view('livewire.vaccine-manager-component');
    }


    public function loadVaccines()
    {
        $this->vaccines = Vaccine::all();
    }

    
    public function showAdd()
    {
        $this->reset(['dataVaccine']);
        $this->modelCreate = true;
    }

    public function loadTypePets()
    {
        $this->typePets = TypePet::all();
    }

    function toggleElement($element) {
        if (in_array($element, $this->dataVaccine['typePets'])) {
            $this->dataVaccine['typePets'] = array_diff($this->dataVaccine['typePets'], [$element]);
        } else {
            $this->dataVaccine['typePets'][] = $element;
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
            $this->loadVaccines();
            $this->reset(['dataVaccine', 'modelCreate']);
        } catch (\Throwable $th) {
            $this->reset(['dataVaccine', 'modelCreate']);
            flash()->error("Ha ocurrido un error". $th->getMessage());
            DB::rollBack();
        }
    }

}
