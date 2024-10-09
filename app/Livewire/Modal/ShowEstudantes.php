<?php

namespace App\Livewire\Modal;

use App\Models\Aluno;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowEstudantes extends Component
{
    #[Locked]
    public $aluno;

    public $formAction = 'atualizar';

    #[On('atualizar-aluno')]
    public function mount($id)
    {
        $this->aluno = Aluno::with(['linhaDoTempo', 'endereco', 'alunos_salas'])->findOrFail($id);
    }

    public function excluir()
    {
        $this->dispatch('openModal', component: 'modal.modal-excluir', arguments:[ 'id' => $this->aluno->id , 'tituloModal' => $this->aluno->nome_completo, 'palavraExcluir' => 'Excluir aluno' ]);
    }

    #[On('atualizar-aluno')]
    public function render()
    {
        return view('livewire.modal.show-estudantes');
    }
}
