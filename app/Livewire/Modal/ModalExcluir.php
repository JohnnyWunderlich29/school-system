<?php

namespace App\Livewire\Modal;

use App\Models\Aluno;
use App\Models\materias;
use App\Models\salas;
use Livewire\Attributes\Locked;
use LivewireUI\Modal\ModalComponent;

class ModalExcluir extends ModalComponent
{
    public $tituloModal;
    #[Locked]
    public $palavraExcluir;
    public $palavraDigitada;
    #[Locked]
    public $id;


    public function mount()
    {
    }

    public function excluir()
    {
        switch ($this->palavraDigitada) {
            case 'Excluir aluno':
                $aluno = Aluno::findOrFail($this->id);
                $aluno->delete();

                $this->dispatch('atualizar-tabela');
                $this->closeModal();
                $this->redirect('/alunos');
                break;
            
            case 'Excluir sala':
                $sala = salas::findOrFail($this->id);
                $sala->delete();

                $this->dispatch('atualizar-tabela');
                $this->closeModal();
                break;

            case 'Excluir materia':
                $materia = materias::findOrFail($this->id);
                $materia->delete();

                $this->dispatch('atualizar-tabela');
                $this->closeModal();
                break;
            default:
                dd('Palavra digitada errada');
                break;
        }
    }

    public function render()
    {
        return view('livewire.modal.modal-excluir');
    }
}
