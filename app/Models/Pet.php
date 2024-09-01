<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'photo_url',
        'type_pet_id',
        'breed_pet_id',
        'color',
        'gender_pet_id',
        'birth_date',
        'owner_id'
    ];

    public function typePet(){
        return $this->belongsTo(TypePet::class);
    }

    public function breedPet(){
        return $this->belongsTo(BreedPet::class);
    }

    
    public function genderPet(){
        return $this->belongsTo(GenderPet::class);
    }

    
    public function user(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function petVaccines(){
        return $this->hasMany(PetVaccine::class);
    }
}
