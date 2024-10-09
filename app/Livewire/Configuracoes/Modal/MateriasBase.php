<?php

namespace App\Livewire\Configuracoes\Modal;

use App\Models\materias;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class MateriasBase extends ModalComponent
{
    #[Locked]
    public $formAction;
    #[Locked]
    public string $title;
    #[Validate('min:3', message : 'Precisa ter no minimo 3 letras')]
    public $nome_materia;
    public int $id_materia;

    public function mount()
    {
    }

    public function criar()
    {
        materias::create([
            'nome_materia' => $this->nome_materia,
        ]);

        $this->dispatch('atualizar-tabela');
        $this->closeModal();
    }

    public function atualizar()
    {
        $this->materia = materias::findOrFail($this->id_materia);
        $this->materia->update([
            'nome_materia' => $this->nome_materia,
        ]);

        $this->dispatch('atualizar-tabela');
        $this->closeModal();
    }
    
    public function render()
    {
        return view('livewire.configuracoes.modal.materias-base');
    }
}
