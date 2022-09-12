<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PriceRange extends Component
{
    public $min = 10;
    public $max = 540;

    public $currentMin = 0;
    public $currentMax = 0;

    public function newMin($newMin){
        $this->min = $newMin;
    }

    public function render()
    {
        return view('livewire.price-range');
    }
}
