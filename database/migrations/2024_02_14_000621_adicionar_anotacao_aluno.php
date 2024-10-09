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
        Schema::table('alunos', function (Blueprint $table)
        {
            $table->text('anotacoes')->nullable;
            $table->string('nome_pai')->nullable;
            $table->string('nome_mae')->nullable;
            $table->date('data_nascimento')->default('1990-01-01')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alunos', function (Blueprint $table){
            $table->dropColumn('anotacoes');
        });
    }
};
