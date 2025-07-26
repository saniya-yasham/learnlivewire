<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $takenUsernames = [];

    public function mount()
    {
        // mount function only runs once when the component renders
        // it runs after everything has been bootstrapped completely

        $this->takenUsernames = User::pluck('username')->toArray()
        ;
    }

    public function render()
    {
        return view('livewire.register');
    }
}
