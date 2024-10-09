<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Homepage extends Component
{
    public $title;


    public function mount()
    {
        $this->title = "Home";
    }

    #[Title('Home')]
    public function render()
    {
        return view('livewire.homepage');
    }
}
