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
        Schema::create('linha_do_tempos', function(Blueprint $table){
            $table->id();
            $table->string('autor');
            $table->string('titulo');
            $table->text('texto');
            $table->foreignId('id_aluno')->constrained('alunos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linha_do_tempos');
    }
};
