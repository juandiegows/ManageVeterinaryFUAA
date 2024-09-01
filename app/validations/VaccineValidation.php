<?php

namespace App\validations;

use Illuminate\Validation\Rule;

class VaccineValidation
{
    public static function getRules(string $entity = 'dataVaccine', ?string $id = null): array
    {
        $entityName = rtrim($entity, '.') . '.';

        return [
            $entityName . 'name' => 'required|string|max:255',
            $entityName . 'description' => 'required',
            $entityName . 'typePets' => 'required|array|min:1', 
        ];
    }



    public static function getMessages(string $entity = 'dataVaccine'): array
    {
        $entityName = rtrim($entity, '.') . '.';

        return [
            $entityName . 'name.required' => 'El nombre es obligatorio.',
            $entityName . 'description.required' => 'La descripcion es obligatorio.',
            $entityName . 'typePets.required' => 'Debe seleccionar al menos un tipo de mascota.', 
            $entityName . 'typePets.min' => 'Debe seleccionar al menos un tipo de mascota.'
        ];
    }
}
