<?php

use App\Models\Pet;
use App\Models\TypePet;
use App\Models\Vaccine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('type_pet_vaccines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TypePet::class)->constrained();
            $table->foreignIdFor(Vaccine::class)->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_pet_vaccines');
    }
};
