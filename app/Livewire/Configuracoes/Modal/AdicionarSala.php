<?php

namespace App\Livewire\Configuracoes\Modal;

use App\Models\materias;
use App\Models\salas;
use App\Models\salas_materias;
use Livewire\Attributes\Locked;
use LivewireUI\Modal\ModalComponent;

class AdicionarSala extends ModalComponent
{
    #[Locked]
    public $formAction;
    #[Locked]
    public string $title;

    public $nome_sala;
    #[Locked]
    public $id;

    public $materiasRecebidas = [];

    #[Locked]
    public salas $sala;

    public function mount()
    {
    }

    public function criar()
    {
        $novaSala = salas::create([
            'nome_sala' => $this->nome_sala,
        ]);

        $this->salasMaterias($novaSala,$this->materiasRecebidas);

        $this->dispatch('atualizar-tabela');
        $this->closeModal();
    }

    private function salasMaterias(salas $sala, int|array $idMateria)
    {
        $querySalas = salas_materias::where('id_sala', $sala->id)->get();

        $queroMaterias = salas_materias::
        //TEM QUE PUXAR DO BANCO AS MATERIAS E COMPARAR PARA INSERIR A CORRETA
        dd($query);

        foreach($idMateria as $id)
        {
            
            dd($salasMaterias);
            $salasMaterias = salas_materias::insert([
                'id_sala' => $sala->id,
                'id_materia' => $id,
            ]);
            
        }

    }

    public function atualizar($id)
    {
        $sala = salas::findOrFail($id);
        $sala->where('id', $id)
            ->update([
                'nome_sala' => $this->nome_sala,
            ]);
        $this->salasMaterias($sala, $this->materiasRecebidas);
        
        $this->dispatch('atualizar-tabela');
        $this->closeModal();
    }

    public function render()
    {
        $materias = materias::all('id','nome_materia');
        return view('livewire.configuracoes.modal.adicionar-sala')->with('materias', $materias);
    }
}
