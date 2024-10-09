<?php

namespace App\Livewire\Editor;

use Livewire\Component;

class EditorDeTexto extends Component
{
    public $string;

    public function mount($receberString)
    {
        $this->string = $receberString;
    }

    public function render()
    {
        return view('livewire.editor.editor-de-texto');
    }
}
