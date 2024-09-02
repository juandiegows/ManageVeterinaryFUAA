<?php

namespace App\Livewire;

use App\Models\BreedPet;
use Livewire\Component;
use Livewire\WithPagination;

class BreedManagerComponent extends Component
{
    use WithPagination;
    public $filterCount = 10;
    public $search = '';
    public $modalCreate = false;
    public $modalDelete = false;
    public function render()
    {
        return view(
            'livewire.breed-manager-component',
            [
                "breedPets" => $this->loadBreedPets()
            ]
        );
    }

    public function loadBreedPets()
    {
        $searchTerm = '%' . $this->search . '%';

        return BreedPet::where('name', 'like', $searchTerm)
            ->paginate($this->filterCount);
    }
}
