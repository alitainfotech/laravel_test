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
        // Get Authencated user
        $user = Auth::user();


        if ($user) {
            // Get data of authencated user
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

    /**
     * Function to validate case name property
    */
    public function updatedCaseName($caseName){

        // Case name property validation
        $this->validateOnly($caseName, [
            'caseName' => ['required', 'string'],
        ]);

        $this->saveData();
    }

    /**
     * Function to validate Maker property
    */
    public function updatedMaker($maker){

        // Maker property validation
        $this->validateOnly($maker, [
            'maker' => ['required'],
        ]);

        $this->saveData();
    }

    /**
     * Function to validate Model
    */
    public function updatedModel($model){

        // Model property validation
        $this->validateOnly($model, [
            'model' => ['required'],
        ]);

        $this->saveData();
    }

    /**
     * Function to validate Milage
    */
    public function updatedMilage($milage){

        // Milage property validation
        $this->validateOnly($milage, [
            'milage' => ['required', 'numeric', 'min:1', 'max:99']
        ]);

        $this->saveData();
    }

    /**
     * Function to validate Purchase Date
    */
    public function updatedBuyingDate($buyingDate){

        // Buying Date property validation
        $this->validateOnly($buyingDate, [
            'buyingDate' => ['required', 'date'],
        ]);

        $this->saveData();
    }

    /**
     * Function to validate Color property
    */
    public function updatedColor($color){

        // Color property validation
        $this->validateOnly($color, [
            'color' => ['required'],
        ]);

        $this->saveData();
    }

    /**
     * Function to validate Drivetrain property
    */
    public function updatedDriveTrain($driveTrain){

        // Drive train property validation
        $this->validateOnly($driveTrain, [
            'driveTrain' => ['required'],
        ]);

        $this->saveData();
    }


    /**
     * Function to validate Image property
    */
    public function updatedImage($image){

        // Image property validation
        $this->validateOnly($image, [
            'image' => ['required', 'image'],
        ]);

        $this->saveData();
    }

    /**
     * Functon to change active tab
    */
    public function nextTab(){
        $this->activeTab = 'page-two';
    }

    /**
     * Function to store properties to database
    */
    public function saveData()
    {
        // Get auth user's data from database
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

        // Check if input has image and mode it to storage
        if($this->image){
            $path = $this->image->store('photo', 'public');
            $data['image'] = $path;
        }

        // Update Or Create properties to database
        if($formData){
            $formData->update($data);
        }else{
            InsuranceCase::create($data);
        }
    }

    /**
     * Function to send success message
    */
    public function getQuote()
    {
        // Success message
        $this->successMessage = 'Thank you! for Inquire, We will Get back to you soon';

        // Change active tab
        $this->activeTab = 'page-one';
    }


    public function render()
    {
        return view('livewire.tabs-container');
    }

}
