<?php

use App\Models\BreedPet;
use App\Models\GenderPet;
use App\Models\TypePet;
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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo_url')->nullable();
            $table->foreignIdFor(TypePet::class)->constrained();
            $table->foreignIdFor(BreedPet::class)->constrained();
            $table->string('color')->nullable();
            $table->foreignIdFor(GenderPet::class)->nullable()->constrained();
            $table->date('birth_date')->nullable();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
