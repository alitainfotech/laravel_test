<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Color extends Component
{
    public $color = ''; // The selected programming language
    public $otherColor = ''; // The input field value for 'Other' language

    public function render()
    {
        return view('livewire.color');
    }
}
