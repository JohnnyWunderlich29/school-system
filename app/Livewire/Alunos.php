<?php

namespace App\Livewire;

use App\Models\Aluno;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Alunos extends Component
{
    use WithPagination;

    public $busca = '';
    
    public $formAction = 'atualizar';

    public function mount()
    {
    }

    public function redirecionar(int $id)
    {
        return redirect()->to('/alunos/'.$id);
    }

    #[On('atualizar-tabela')]
    public function render()
    {
        sleep(1);
        return view('livewire.alunos', [
            'alunos' => Aluno::where('nome_completo', 'like','%'.$this->busca.'%')->paginate(10),
        ]);
    }
}
