<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TabsContainer extends Component
{
    public $activeTab = 'page-one';

    public function switchToTab2()
    {
        $this->activeTab = 'page-two';
    }

    public function render()
    {
        return view('livewire.tabs-container');
    }

}
