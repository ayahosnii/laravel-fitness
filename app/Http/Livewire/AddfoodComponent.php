<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddfoodComponent extends Component
{
    public $currentStep = 1;
    public $count = 0;



    public function increment()

    {

        $this->count++;

    }
    public function render()
    {
        return view('livewire.addfood-component');
    }
}
