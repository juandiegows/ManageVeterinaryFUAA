<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function typePets(){

        return $this->belongsToMany(TypePet::class, TypePetVaccine::class);
    }

    public function TypePetVaccine(){

        return $this->hasMany( TypePetVaccine::class);
    }

}
