<?php

namespace App\Livewire\Menu;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class MenuTop extends Component
{

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
    
    public function render()
    {
        return view('livewire.menu.menu-top');
    }
}
