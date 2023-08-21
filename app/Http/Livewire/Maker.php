<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Maker extends Component
{
    public $maker = null;
    public $model = [];

    public function updatedCategory($value)
    {
        // Simulate dynamic data source based on selected category
        if ($value === 'bmw') {
            $this->model = [
                '3 Series',
                '5 Series',
                '7 Series',
            ];
        } elseif ($value === 'mercedes') {
            $this->model = [
                'C class',
                'E class',
                'S class',
            ];
        } elseif ($value === 'jeep') {
            $this->model = [
                'Wrangler',
                'Grand Cherokee',
            ];
        } else {
            $this->model = [];
        }
    }
    public function render()
    {
        return view('livewire.maker');
    }
}
