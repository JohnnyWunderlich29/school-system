<?php

namespace App\Models;

use App\Models\Aluno\Aluno;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alunos_salas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_aluno',
        'id_sala'
    ];

    public function Aluno()
    {
        return $this->hasMany(Aluno::class, 'id', 'id_aluno');
    }

    public function salas()
    {
        return $this->hasMany(salas::class, 'id', 'id_sala');
    }
}
