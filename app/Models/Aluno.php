<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo',
        'contato',
        'matricula',
        'turma_id',
        'data_nascimento',
        'sexo',
        'parentesco',
        'nome_mae',
        'nome_pai',
        'anotacoes',
    ];

    public function turma()
    {
        return $this->belongsTo('App\Models\Turma');
    }

    public function alunos_salas()
    {
        return $this->hasOne(alunos_salas::class, 'id_aluno', 'id');

    }

    public function notas()
    {
        return $this->hasMany('App\Models\Nota');
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class,'id_aluno');
    }

    public function linhaDoTempo()
    {
        return $this->hasMany(LinhaDoTempo::class, 'id_aluno');
    }

    public function faltas()
    {
        return $this->hasMany('App\Models\Falta');
    }
}
