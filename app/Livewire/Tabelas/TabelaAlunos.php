<?php

namespace App\Livewire\Tabelas;

use App\Models\Aluno;
use Livewire\Attributes\On;
use Livewire\Component;

class TabelaAlunos extends Component
{

    public $aluno;

    public function mount(Aluno $aluno = null)
    {
        $this->aluno = $aluno;
    }

    public function openModal(int $id)
    {
        $this->aluno = Aluno::findOrFail($id);
    }
    public function listarDados()
    {
        return Aluno::all();
    }

    public function redirecionar(int $id)
    {
        return $this->redirect('/alunos/'.$id, navigate: true);
    }

    #[On('atualizar-tabela')]
    public function render()
    {
        $this->dados = $this->listarDados();
        return view('livewire.tabelas.tabela-alunos')->with('alunosLista', $this->dados);
    }
}
