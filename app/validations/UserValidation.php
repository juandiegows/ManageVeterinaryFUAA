<?php

namespace App\validations;

use Illuminate\Validation\Rule;

class UserValidation
{
    public static function getRules(string $entity = 'dataUser', ?string $id = null): array
    {
        $entityName = rtrim($entity, '.') . '.';

        return [
            $entityName . 'name' => 'required|string|max:255',
            $entityName . 'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id),
            ],
            $entityName . 'password' => 'required|string|min:8|confirmed',
            $entityName . 'password_confirmation' => 'required|string|min:8',
        ];
    }

    public static function getRulesUpdate(string $entity = 'dataUser', ?string $id = null): array
    {
        $entityName = rtrim($entity, '.') . '.';

        return [
            $entityName . 'name' => 'required|string|max:255',
            $entityName . 'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id),
            ]
        ];
    }


    public static function getMessages(string $entity = 'dataUser'): array
    {
        $entityName = rtrim($entity, '.') . '.';

        return [
            $entityName . 'name.required' => 'El nombre es obligatorio.',
            $entityName . 'name.string' => 'El nombre debe ser una cadena de texto.',
            $entityName . 'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            $entityName . 'email.required' => 'El correo es obligatorio.',
            $entityName . 'email.email' => 'El correo debe ser una dirección de correo electrónico válida.',
            $entityName . 'email.max' => 'El correo no puede tener más de 255 caracteres.',
            $entityName . 'email.unique' => 'Ya existe un usuario con este correo.',
            $entityName . 'password.required' => 'La contraseña es obligatoria.',
            $entityName . 'password.string' => 'La contraseña debe ser una cadena de texto.',
            $entityName . 'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            $entityName . 'password.confirmed' => 'Las contraseñas no coinciden.',
            $entityName . 'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria.',
            $entityName . 'password_confirmation.string' => 'La confirmación de la contraseña debe ser una cadena de texto.',
            $entityName . 'password_confirmation.min' => 'La confirmación de la contraseña debe tener al menos 8 caracteres.',
        ];
    }
}
