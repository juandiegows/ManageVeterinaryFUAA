<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insertOrIgnore([
            // Usuarios específicos (Rol: Doctor)
            [
                'name' => 'Maria Labarca Briceño',
                'email' => 'mlabarca@estudiantes.areandina.edu.co',
                'password' => Hash::make('password'),
                'role_id' => 1, // Rol: Doctor
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sebastian Bautista',
                'email' => 'sbautista15@estudiantes.areandina.edu.co',
                'password' => Hash::make('password'),
                'role_id' => 1, // Rol: Doctor
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juan Diego Mejia',
                'email' => 'jmejia580@estudiantes.areandina.edu.co',
                'password' => Hash::make('password'),
                'role_id' => 1, // Rol: Doctor
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@juandiegows.com',
                'password' => Hash::make('password'),
                'role_id' => 1, // Rol: Doctor
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Usuarios de ejemplo (Rol: Usuario)
            [
                'name' => 'Alice Smith',
                'email' => 'alice.smith@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob.johnson@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carol Davis',
                'email' => 'carol.davis@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eva Brown',
                'email' => 'eva.brown@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frank Miller',
                'email' => 'frank.miller@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grace Taylor',
                'email' => 'grace.taylor@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hank Anderson',
                'email' => 'hank.anderson@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ivy Thomas',
                'email' => 'ivy.thomas@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jack Martinez',
                'email' => 'jack.martinez@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Rol: Usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
