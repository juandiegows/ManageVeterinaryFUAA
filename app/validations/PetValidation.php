<?php

namespace App\validations;

class PetValidation
{
    public static function getRules(string $entity = 'dataPet', ?string $id = null): array
    {
        $entityName = rtrim($entity, '.') . '.';

        return [
            $entityName . 'name' => 'required|string|max:255',
            $entityName . 'owner_id' => 'required',
            $entityName . 'type_pet_id' => 'required',
            $entityName . 'breed_pet_id' => 'required',
            $entityName . 'gender_pet_id' => 'required',
        ];
    }

    public static function getMessages(string $entity = 'dataPet'): array
    {
        $entityName = rtrim($entity, '.') . '.';

        return [
            $entityName . 'name.required' => 'El nombre de la mascota es obligatorio.',
            $entityName . 'owner_id.required' => 'El dueño es obligatorio.',
            $entityName . 'name.string' => 'El nombre de la mascota debe ser una cadena de texto.',
            $entityName . 'name.max' => 'El nombre de la mascota no puede tener más de 255 caracteres.',
            $entityName . 'type_pet_id.required' => 'El tipo de mascota es obligatorio.',
            $entityName . 'breed_pet_id.required' => 'La raza de la mascota es obligatoria.',
            $entityName . 'gender_pet_id.required' => 'El género de la mascota es obligatorio.',
        ];
    }
}
