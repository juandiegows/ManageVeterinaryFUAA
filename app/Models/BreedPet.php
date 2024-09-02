<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedPet extends Model
{
    use HasFactory;
    public function TypePet(){
        return $this->belongsTo(TypePet::class);
    }

    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
