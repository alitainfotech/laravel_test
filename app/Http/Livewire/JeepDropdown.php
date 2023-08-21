<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JeepDropdown extends Component
{
    public function render()
    {
        return view('livewire.jeep-dropdown');
    }

    public function updatedJeepModel($value)
    {
        dd($value);
        // You can define logic here to handle the selected Jeep model.
        // For example, you can emit an event or update a property in the parent component.
    }
}
