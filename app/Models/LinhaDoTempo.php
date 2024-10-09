<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinhaDoTempo extends Model
{
    use HasFactory;

    protected $fillable = [
        'autor',
        'titulo',
        'texto',
        'id_aluno',
    ];

    public function Aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
