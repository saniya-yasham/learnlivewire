<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $takenUsernames = [];

    public function mount()
    {
        // Populate usernames at component mount
        $this->takenUsernames = User::pluck('username')->toArray();
    }

    public function render()
    {
        return view('livewire.register', [
            'takenUsernames' => $this->takenUsernames
        ]);
    }
}
