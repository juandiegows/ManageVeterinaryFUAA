<?php

namespace Database\Seeders;

use App\Models\Vaccine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vaccine::insertOrIgnore([
            // Perro (ID: 1)
            ['id' => 1, 'name' => 'Rabia', 'description' => 'Protege contra la rabia.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Parvovirus', 'description' => 'Protege contra el parvovirus.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Moquillo', 'description' => 'Protege contra el moquillo canino.', 'created_at' => now(), 'updated_at' => now()],

            // Gato (ID: 2)
            ['id' => 4, 'name' => 'Rabia Felina', 'description' => 'Protege contra la rabia en gatos.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Calicivirus Felino', 'description' => 'Protege contra el calicivirus felino.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Panleucopenia', 'description' => 'Protege contra la panleucopenia felina.', 'created_at' => now(), 'updated_at' => now()],

            // Pájaro (ID: 3)
            ['id' => 7, 'name' => 'Viruela Aviar', 'description' => 'Protege contra la viruela en aves.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Enfermedad de Newcastle', 'description' => 'Protege contra la enfermedad de Newcastle.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Gripe Aviar', 'description' => 'Protege contra la gripe aviar.', 'created_at' => now(), 'updated_at' => now()],

            // Pez (ID: 4)
            ['id' => 10, 'name' => 'Vacuna Bacteriana', 'description' => 'Protege contra infecciones bacterianas.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Vacuna Viral', 'description' => 'Protege contra infecciones virales.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Vacuna Fúngica', 'description' => 'Protege contra infecciones fúngicas.', 'created_at' => now(), 'updated_at' => now()],

            // Reptil (ID: 5)
            ['id' => 13, 'name' => 'Salmonelosis', 'description' => 'Protege contra la salmonelosis en reptiles.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Vacuna contra el Parásito', 'description' => 'Protege contra parásitos.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'Vacuna contra Hongos', 'description' => 'Protege contra infecciones fúngicas.', 'created_at' => now(), 'updated_at' => now()],

            // Roedor (ID: 6)
            ['id' => 16, 'name' => 'Rabia Roedores', 'description' => 'Protege contra la rabia en roedores.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'Vacuna contra Bacterias', 'description' => 'Protege contra infecciones bacterianas.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'Tétanos', 'description' => 'Protege contra el tétanos.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
