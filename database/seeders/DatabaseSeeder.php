<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            TypePetSeeder::class,
            BreedPetSeeder::class,
            GenderPetSeeder::class,
            VaccineSeeder::class,
            TypePetVaccineSeeder::class,
            UserSeeder::class
        ]);
    }
}
