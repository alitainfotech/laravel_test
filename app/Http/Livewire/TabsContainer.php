<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InsuranceCase;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\File;

class TabsContainer extends Component
{
    use WithFileUploads;

    public $activeTab = 'page-one';
    public $caseName;
    public $maker;
    public $model;
    public $milage;
    public $buyingDate;
    public $color;
    public $driveTrain;
    public $image;
    public $successMessage = '';

    public function mount()
    {
        $user = Auth::user();

        if ($user) {
            $formData = InsuranceCase::where('user_id', $user->id)->first();

            if ($formData) {
                $this->caseName  = $formData->name;
                $this->maker = $formData->maker;
                $this->model = $formData->model;
                $this->milage = $formData->milage;
                $this->buyingDate = $formData->buying_date;
                $this->color = $formData->color;
                $this->driveTrain = $formData->drive_train;
            }
        }
    }

    public function updatedCaseName($caseName){

        $this->validateOnly($caseName, [
            'caseName' => ['required', 'string'],
        ]);

        $this->saveData();
    }

    public function updatedMaker($maker){

        $this->validateOnly($maker, [
            'maker' => ['required'],
        ]);

        $this->saveData();
    }

    public function updatedModel($model){

        $this->validateOnly($model, [
            'model' => ['required'],
        ]);

        $this->saveData();
    }

    public function updatedMilage($milage){

        $this->validateOnly($milage, [
            'milage' => ['required', 'numeric', 'min:1', 'max:99']
        ]);

        $this->saveData();
    }

    public function updatedBuyingDate($buyingDate){

        $this->validateOnly($buyingDate, [
            'buyingDate' => ['required', 'date'],
        ]);

        $this->saveData();
    }

    public function updatedColor($color){

        $this->validateOnly($color, [
            'color' => ['required'],
        ]);

        $this->saveData();
    }

    public function updatedDriveTrain($driveTrain){

        $this->validateOnly($driveTrain, [
            'driveTrain' => ['required'],
        ]);

        $this->saveData();
    }

    public function updatedImage($image){

        $this->validateOnly($image, [
            'image' => ['required', 'image'],
        ]);

        $this->saveData();
    }

    public function nextTab(){

        $this->activeTab = 'page-two';

    }

    public function saveData()
    {
        $formData = InsuranceCase::where('user_id', Auth()->user()->id)->first();

        $data = [
            'user_id' => Auth::id(),
            'name' => $this->caseName,
            'maker' => $this->maker,
            'model' => $this->model,
            'milage' => $this->milage,
            'buying_date' => $this->buyingDate,
            'color' => $this->color,
            'drive_train' => $this->driveTrain,
        ];

        if($this->image){
            $path = $this->image->store('photo', 'public');
            $data['image'] = $path;
        }

        if($formData){
            $formData->update($data);
        }else{
            InsuranceCase::create($data);
        }
    }

    public function getQuote()
    {
        $this->successMessage = 'Thank you! for Inquire, We will Get back to you soon';

        $this->activeTab = 'page-one';
    }


    public function render()
    {
        return view('livewire.tabs-container');
    }

}
