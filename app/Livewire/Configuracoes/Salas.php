<?php

namespace App\Livewire\Configuracoes;

use App\Models\salas_materias;
use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Salas extends Component
{
    use WithPagination;

    public $formAction = 'atualizar';
    public $busca = '';
    protected $palavraChave = 'Excluir sala';

    public \App\Models\salas $salas_materias;

    public function listarDados()
    {
        
    }

    public function atualizar($id)
    {
        $sala = \App\Models\salas::findOrFail($id);

        $arrayMaterias = [];
        foreach($sala->salas_materias as $materia)
        {
            $arrayMaterias[] = $materia['id_materia'];
        }

        $this->dispatch('openModal',  component: 'configuracoes.modal.adicionar-sala', arguments: ['id' => $id , 'formAction' => 'atualizar', 'title' => 'Atualizar - '.$sala->nome_sala, 'nome_sala' => $sala->nome_sala, 'materiasRecebidas' => $arrayMaterias]);
    }

    public function excluir($id)
    {
        $sala = \App\Models\salas::findOrFail($id);
        $this->dispatch('openModal', component : 'modal.modal-excluir', arguments: [ 'id' => $sala->id, 'tituloModal' => $sala->nome_sala, 'palavraExcluir' => 'Excluir sala']);
    }

    #[On('atualizar-tabela')]
    public function render()
    {
        sleep(0.5);
        return view('livewire.configuracoes.salas', [
            'salas' => \App\Models\salas::where('nome_sala', 'like', '%'.$this->busca.'%')->paginate(10),
        ]);
    }
}
