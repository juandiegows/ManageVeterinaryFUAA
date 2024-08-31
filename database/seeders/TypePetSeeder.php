<?php

namespace Database\Seeders;

use App\Models\TypePet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePet::insertOrIgnore([
            ['id' => 1, 'name' => 'Perro', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Gato', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Pájaro', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Pez', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Reptil', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Roedor', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
