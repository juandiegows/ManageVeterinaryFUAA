<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePet extends Model
{
    use HasFactory;

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function typePetVaccines()
    {
        return $this->hasMany(TypePetVaccine::class);
    }
}
