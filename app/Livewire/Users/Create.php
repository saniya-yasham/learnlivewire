<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{

    public $username = '';
    // public $takenUsernames = [];

    // public function mount(){
    //     $this->takenUsernames = User::pluck('username')->toArray();
    // }

    //actions
    public function save()
    {
        //validation

        User::create([
            'username' => $this->username,
        ]);

        // redirect()->route('users.index')->with()
        session()->flash('users.create', "User created Successfully");
    }

    public function render()
    {
        return view('livewire.users.create',
        [
            'takenUsernames' => User::pluck('username')->toArray()
        ]);
    }
}
