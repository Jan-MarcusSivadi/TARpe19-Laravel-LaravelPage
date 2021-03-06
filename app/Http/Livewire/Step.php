<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{
    public $steps = [];

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function remove($index)
    {
        // dd($this->steps[$index]);
        // $this->steps[$index]++;
        // $this->steps[$index+1]++;
        unset($this->steps[$index]);   
    }

    public function render()
    {
        return view('livewire.step');
    }
}
