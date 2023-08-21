<?php

namespace App\Http\Livewire;

use App\Models\InsuranceCase;
use Livewire\Component;

class PageOne extends Component
{
    public $case_name;
    public $milage;
    public $date;

    public function updatedInputValue()
    {
        InsuranceCase::create([
            'name' => $this->case_name,
            'milage' => $this->milage,
            'buying_date' => $this->date
        ]);
    }


    public function render()
    {
        $this->updatedInputValue();
        return view('livewire.page-one');
    }
}
