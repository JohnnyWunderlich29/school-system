<?php

namespace App\Livewire\Configuracoes\Modal;

use App\Models\materias;
use App\Models\salas;
use LivewireUI\Modal\ModalComponent;

class ModalBase extends ModalComponent
{

    public function render()
    {
        
        return view('livewire.configuracoes.modal.modal-base');
    }
}
