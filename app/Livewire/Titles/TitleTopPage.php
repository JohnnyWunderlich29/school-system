<?php

namespace App\Livewire\Titles;

use Livewire\Component;

class TitleTopPage extends Component
{

    public $title;

    public function mount($title)
    {
        $this->title = $title;
    }


    public function render()
    {
        return view('livewire.titles.title-top-page');
    }
}
