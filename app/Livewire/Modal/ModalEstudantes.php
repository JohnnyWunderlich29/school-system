<?php

namespace App\Livewire\Modal;

use App\Models\Aluno;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalEstudantes extends Component
{

    public string $nome_completo;
    public string $contato;
    public $deficiente = false;
    public $aluno;

    #[On('modal-estudantes')]
    public function editar($aluno)
    {

        $this->mount();
        
    }


    public function salvar()
    {

        Aluno::create(
            $this->only(['nome_completo','contato'])
        );

        $this->dispatch('atualizar-tabela');
    }

    public function render()
    {
        return view('livewire.modal.modal-estudantes')->with('aluno', $this->aluno);
    }
}
