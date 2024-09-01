<?php

namespace App\Actions\Pet;

use App\Models\Pet;

use Illuminate\Database\QueryException;
class PetCreate
{


    public static function create(array $data): Pet|QueryException
    {
        try {
            $pet = new Pet();
            $pet->fill($data);
            $pet->save();

            return $pet;
        } catch (QueryException $th) {
            return $th;
        }
    }
}
