<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

class Counter extends Component
{
     
    public int $count = 0;

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }

    #[Title('Counter Page')] 
    public function render()
    {
        return view('livewire.counter');
    }
}
