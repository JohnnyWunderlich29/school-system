<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_sala',
    ];


    public function Alunos_salas()
    {
        return $this->hasOne(alunos_salas::class, 'id_sala', 'id');
    }

    public function salas_materias()
    {
        return $this->hasMany(salas_materias::class, 'id_sala', 'id');
    }
}
