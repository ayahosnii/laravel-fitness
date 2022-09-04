<?php

namespace App\Http\Livewire;

use App\Models\AddFood;
use Livewire\Component;

class AddfoodComponent extends Component
{
    public $currentStep = 1,

        // Food_Info
        $food_name, $serving_size, $servings_per_container, $calories,
        $fat, $carbs, $protein,

        // Main Food Info
        $saturated, $polyunsaturated, $monounsaturated, $trans, $cholesterol,
        $sugars, $sodium, $potassium, $dietary_fiber, $vitamin_a, $vitamin_c,
        $calcium, $iron;


    public function updated($propertyName)

    {

        $this->validateOnly($propertyName,[
            'food_name' =>'required|string',
        ]);

    }


    public function render()
    {
        return view('livewire.addfood-component');
    }

    /*
     * $food_name, $serving_size, $servings_per_container, $calories,
        $fat, $carbs, $protein,*/
    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'food_name' =>'required|string',
            'serving_size' =>'required|numeric|max:10000',
            'servings_per_container' =>'required|numeric|max:10000',
            'calories' =>'required|numeric|max:10000',
            'fat' =>'required|numeric|max:10000',
            'carbs' =>'required|numeric|max:10000',
            'protein' =>'required|numeric|max:10000',
        ]);
        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->currentStep = 3;
    }

    public function submitFood()
    {
        $My_Food = new AddFood();
        // Food_Info
        $My_Food->Food_Name = $this->food_name;
        $My_Food->serving_size = $this->serving_size;
        $My_Food->servings_per_container = $this->servings_per_container;
        $My_Food->calories = $this->food_name;
        $My_Food->total_fat = $this->fat;
        $My_Food->total_carbs = $this->carbs;
        $My_Food->protein = $this->protein;

        // Main Food Info
        $My_Food->saturated = $this->saturated;
        $My_Food->polyunsaturated = $this->polyunsaturated;
        $My_Food->monounsaturated = $this->monounsaturated;
        $My_Food->trans = $this->trans;
        $My_Food->cholesterol = $this->cholesterol;
        $My_Food->sugars = $this->sugars;
        $My_Food->sodium = $this->sodium;
        $My_Food->potassium = $this->potassium;
        $My_Food->dietary_fiber = $this->dietary_fiber;
        $My_Food->vitamin_a = $this->vitamin_a;
        $My_Food->vitamin_c = $this->vitamin_c;
        $My_Food->calcium = $this->calcium;
        $My_Food->iron = $this->iron;
        if (!$this->has('for_member'))
            $My_Food->for_member = $this->for_member=0;

        else
            $My_Food->for_member = $this->for_member=1;

    }




    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

}
