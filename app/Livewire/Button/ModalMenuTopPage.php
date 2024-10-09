<?php

namespace App\Livewire\Button;

use Livewire\Component;

class ModalMenuTopPage extends Component
{
    public $modal;

    public function abrirModal()
    {
        $this->dispatch('openModal', component: 'modal.modal-aluno', arguments: ['formAction' => 'salvar', 'title' => 'Cadastro de aluno']);
    }

    public function mount($modal):void
    {
        $this->modal = $modal;
    }

    public function render()
    {
        return view('livewire.button.modal-menu-top-page');
    }
}
