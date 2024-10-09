<?php

namespace App\Livewire\Modal;

use App\Models\LinhaDoTempo;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class ModalLinhaDoTempo extends ModalComponent
{
    public $formAction;
    public $tituloModal;
    public $usuario;

    public $id_aluno;

    public LinhaDoTempo $linhaDoTempo;

    #[Validate('required|min:3', message: 'Deve ter um titulo')]
    public $titulo;

    #[Validate('required|min:3', message: 'Deve ter uma mensagem')]
    public $mensagem;

    public function salvar()
    {

        $this->validate();

        LinhaDoTempo::create([
            'autor' => $this->titulo,
            'titulo' => $this->titulo,
            'texto' => $this->mensagem,
            'id_aluno' => $this->id_aluno
        ]);

        $this->dispatch('atualizar-aluno', id: $this->id_aluno);
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.modal.modal-linha-do-tempo');
    }
}
