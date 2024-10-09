<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;

class AlunoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function deletar(?User $user, Aluno $aluno): bool
    {
        dd($aluno);
        return true;
    }
}
