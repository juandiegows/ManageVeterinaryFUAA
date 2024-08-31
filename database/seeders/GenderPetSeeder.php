<?php

namespace Database\Seeders;

use App\Models\GenderPet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderPetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GenderPet::insertOrIgnore([
            [
                "name" => "Macho",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Hembra",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ]);
    }
}
