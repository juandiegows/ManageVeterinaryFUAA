<?php

namespace App\Actions\Vaccine;

use App\Models\Pet;
use App\Models\TypePetVaccine;
use App\Models\Vaccine;
use Illuminate\Database\QueryException;

class VaccineCreate
{


    public static function create(array $data): Vaccine|QueryException
    {
        try {
            $vaccine = new Vaccine();
            $vaccine->fill($data);
            $vaccine->save();

            return $vaccine;
        } catch (QueryException $th) {
            return $th;
        }
    }

    public static function addTypePet(Vaccine $vaccine, array $typePets): Vaccine|QueryException
    {
        try {

            foreach ($typePets as  $value) {
                $typeVaccine = new  TypePetVaccine;
                $typeVaccine->type_pet_id = $value;
                $typeVaccine->vaccine_id = $vaccine->id;
                $typeVaccine->save();
            }
            return $vaccine;
        } catch (QueryException $th) {
            return $th;
        }
    }
}
