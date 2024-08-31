<?php

namespace Database\Seeders;

use App\Models\TypePetVaccine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePetVaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePetVaccine::insertOrIgnore([
            // Perro
            ['type_pet_id' => 1, 'vaccine_id' => 1], // Rabia
            ['type_pet_id' => 1, 'vaccine_id' => 2], // Parvovirus
            ['type_pet_id' => 1, 'vaccine_id' => 3], // Moquillo

            // Gato
            ['type_pet_id' => 2, 'vaccine_id' => 4], // Rabia Felina
            ['type_pet_id' => 2, 'vaccine_id' => 5], // Calicivirus Felino
            ['type_pet_id' => 2, 'vaccine_id' => 6], // Panleucopenia

            // Pájaro
            ['type_pet_id' => 3, 'vaccine_id' => 7], // Viruela Aviar
            ['type_pet_id' => 3, 'vaccine_id' => 8], // Enfermedad de Newcastle
            ['type_pet_id' => 3, 'vaccine_id' => 9], // Gripe Aviar

            // Pez
            ['type_pet_id' => 4, 'vaccine_id' => 10], // Vacuna Bacteriana
            ['type_pet_id' => 4, 'vaccine_id' => 11], // Vacuna Viral
            ['type_pet_id' => 4, 'vaccine_id' => 12], // Vacuna Fúngica

            // Reptil
            ['type_pet_id' => 5, 'vaccine_id' => 13], // Salmonelosis
            ['type_pet_id' => 5, 'vaccine_id' => 14], // Vacuna contra el Parásito
            ['type_pet_id' => 5, 'vaccine_id' => 15], // Vacuna contra Hongos

            // Roedor
            ['type_pet_id' => 6, 'vaccine_id' => 16], // Rabia Roedores
            ['type_pet_id' => 6, 'vaccine_id' => 17], // Vacuna contra Bacterias
            ['type_pet_id' => 6, 'vaccine_id' => 18], // Tétanos
        ]);
    }
}
