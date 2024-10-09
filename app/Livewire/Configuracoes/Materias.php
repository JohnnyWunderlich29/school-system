<?php

namespace App\Livewire\Configuracoes;

use Livewire\Attributes\On;
use Livewire\Component;

class Materias extends Component
{
    public $formAction = 'atualizar';
    public $materias;
    public $id;

    public function listarDados()
    {
        return \App\Models\materias::all('id','nome_materia');
    }

    public function editar($id)
    {
        $materia = \App\Models\materias::findOr($id);
        $this->dispatch('openModal', component: 'configuracoes.modal.materias-base', arguments:[ 'id_materia' => $materia->id, 'formAction' => 'atualizar', 'nome_materia' => $materia->nome_materia, 'title' => 'Atualizar - '.$materia->nome_materia]);
    }

    public function excluir($id)
    {
        $materia = \App\Models\materias::findOrFail($id);
        $this->dispatch('openModal', component: 'modal.modal-excluir', arguments:[ 'id' => $materia->id , 'tituloModal' => $materia->nome_materia, 'palavraExcluir' => 'Excluir materia']);
    }

    #[On('atualizar-tabela')]
    public function render()
    {
        $this->materias = $this->listarDados();
        return view('livewire.configuracoes.materias')->with('materias', $this->materias);
    }
}
