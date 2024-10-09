<?php

namespace App\Livewire\Modal;

use App\Models\Aluno;
use App\Models\alunos_salas;
use App\Models\Endereco;
use App\Models\salas;
use DB;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class ModalAluno extends ModalComponent
{

    public Aluno $aluno;
    public Endereco $endereco;

    #[Validate('required', message: 'Rua precisa existir.')]
    #[Validate('min:3', message: 'Precisa ter no minimo 3 caracteres.')]
    public $rua;
    #[Validate('required', message: 'Bairro precisa existir.')]
    #[Validate('min:3', message: 'Precisa ter no minimo 3 caracteres.')]
    public $bairro;
    #[Validate('required', message: 'Numero precisa existir.')]
    #[Validate('min:1', message: 'Precisa ter no minimo 1 caracteres.')]
    public $numero;
    #[Validate('required', message: 'CEP precisa existir.')]
    #[Validate('min:3', message: 'Precisa ter no minimo 3 caracteres.')]
    public $cep;
    #[Validate('required', message: 'Cidade precisa existir.')]
    #[Validate('min:3', message: 'Precisa ter no minimo 3 caracteres.')]
    public $cidade;

    #[Validate('min:3', message: 'Precisa ter no minimo 3 caracteres.')]
    public $nome_mae;

    #[Validate('min:3', message: 'Precisa ter no minimo 3 caracteres.')]
    public $nome_pai;

    public $anotacoes = '';

    #[Validate('required', message: 'Nome precisa existir.')]
    #[Validate('min:3', message: 'Precisa ter no minimo 3 caracteres.')]
    public $nome_completo;

    #[Validate('required', message: 'Contato precisa existir.')]
    #[Validate('min:3', message: 'Precisa ter no minimo 11 caracteres.')]
    public $contato;

    public $data_nascimento;

    public $sala_aluno;


    public string $formAction;
    public string $title;
    public $message;

    public $salas;

    public static function maxWidthClass()
    {
        return 'max-w-10xl';
    }

    public function mount()
    {
        $this->salas = salas::all();
    }

    public function salvar()
    {

        $validate = $this->validate();

        DB::transaction(function () {
            $aluno = Aluno::create([
                'nome_completo' => $this->nome_completo,
                'contato' => $this->contato,
                'nome_mae' => $this->nome_mae,
                'nome_pai' => $this->nome_pai,
                'anotacoes' => $this->anotacoes,
                'data_nascimento' => $this->data_nascimento ? $this->data_nascimento : now()->format('Y-m-d'),
            ]);

            $this->criarEndereco($aluno->id);
            $this->vincularSala($aluno->id);
        });
    
        $this->dispatch('atualizar-tabela');
        $this->closeModal();
    }

    public function criarEndereco($id)
    {
        Endereco::create([
            'rua' => $this->rua,
            'bairro' => $this->bairro,
            'numero' => $this->numero,
            'cep' => $this->cep,
            'cidade' => $this->cidade,
            'id_aluno' => $id,
        ]);
    }

    public function vincularSala($id)
    {
        alunos_salas::create([
            'id_aluno' => $id,
            'id_sala' => $this->sala_aluno,
        ]);
    }

    public function atualizar($id)
    {
        $this->validate();

        $aluno = Aluno::with('endereco','alunos_salas')->findOrFail($id);
        $aluno->update([
            'nome_completo' => $this->nome_completo,
            'contato' => $this->contato,
            'nome_mae' => $this->nome_mae,
            'nome_pai' => $this->nome_pai,
            'anotacoes' => $this->anotacoes,
            'data_nascimento' => $this->data_nascimento,
        ]);

        if($aluno->endereco === null)
        {
            $this->criarEndereco($aluno->id);
        } else {
            $aluno->endereco->update([
                'rua' => $this->rua,
                'bairro' => $this->bairro,
                'numero' => $this->numero,
                'cep' => $this->cep,
                'cidade' => $this->cidade,
            ]);
        }

        if($aluno->alunos_salas === null)
        {
            $this->vincularSala($id);
        } else {
            $aluno->alunos_salas->update([
                'id_sala' => $this->sala_aluno,
            ]);
        }

        $this->dispatch('atualizar-aluno', id: $aluno->id);
        $this->closeModal();

    }

    public function render()
    {
        return view('livewire.modal.modal-aluno');
    }
}
