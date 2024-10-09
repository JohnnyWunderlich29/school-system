<?php

namespace App\Livewire\Configuracoes\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AdicionarProfessor extends ModalComponent
{

    public $salas = [];
    public $sala = [];

    public function render()
    {
        return view('livewire..configuracoes.modal.adicionar-professor');
    }
}
