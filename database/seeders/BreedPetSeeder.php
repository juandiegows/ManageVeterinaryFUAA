<?php

namespace Database\Seeders;

use App\Models\BreedPet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedPetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BreedPet::insertOrIgnore([
            // Razas de Perro
            ['name' => 'Labrador', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bulldog', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Poodle', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Golden Retriever', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beagle', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chihuahua', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dachshund', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Boxer', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pomeranian', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rottweiler', 'type_pet_id' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Razas de Gato
            ['name' => 'Persa', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Siamés', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maine Coon', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bengalí', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Siberiano', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ragdoll', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Esfinge', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Británico', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chartreux', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Abisinio', 'type_pet_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Razas de Pájaro
            ['name' => 'Canario', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Periquito', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agapornis', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cacatúa', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Diamante Mandarín', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Loro Gris Africano', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jilguero', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Guacamayo', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cotorra', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Calopsita', 'type_pet_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Razas de Pez
            ['name' => 'Betta', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Guppy', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tetra Neón', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pez Ángel', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Molly', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Disco', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cíclido', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pez Payaso', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Oscar', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pez Dorado', 'type_pet_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Razas de Reptil
            ['name' => 'Iguana', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gecko Leopardo', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tortuga', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Serpiente del Maíz', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Camaleón', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dragón Barbudo', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Anole Verde', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Boa Constrictor', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pitón Real', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Serpiente Rey', 'type_pet_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Razas de Roedor
            ['name' => 'Hamster', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cobaya', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rata', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chinchilla', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ratón', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Degú', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jerbo', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ardilla', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Conejo', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Erizo', 'type_pet_id' => 6, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
