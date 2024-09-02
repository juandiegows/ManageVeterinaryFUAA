<?php

namespace App\Actions\Pet;

use App\Models\Pet;

use Illuminate\Database\QueryException;
class PetUpdate
{

    public static function create(array $data): Pet|QueryException
    {
        try {
            $pet =  Pet::find($data['id']);
            $pet->fill($data);
            $pet->save();

            return $pet;
        } catch (QueryException $th) {
            return $th;
        }
    }
}
