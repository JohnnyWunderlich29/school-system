<?php

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
        Schema::create('salas_materias', function(Blueprint $table){
            $table->id();
            $table->foreignId('id_sala')->constrained('salas')->onDelete('cascade');
            $table->foreignId('id_materia')->constrained('materias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas_materias');
    }
};
