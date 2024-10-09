<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salas_materias extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sala',
        'id_materia',
    ];

    public function salas()
    {
        return $this->hasMany(salas::class, 'id', 'id_sala');
    }

    public function materias()
    {
        return $this->hasMany(materias::class, 'id', 'id_materia');
    }
}
