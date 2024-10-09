<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_materia',
    ];

    public function materias_salas()
    {
        return $this->hasOne(salas_materias::class, 'id_materia', 'id');
    }
}
