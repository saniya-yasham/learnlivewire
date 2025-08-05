<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $lastStep = 3;
    public $username = '';
    public $email = '';
    public $password = '';
    public $avatarPath = '';
    public $avatar;

    public function nextStep()
    {
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function save()
    {
        // Validate the data
        $validatedData = $this->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);


        // store data
        User::create($validatedData);

        // Here you would typically save the data to the database
        session()->flash('users.create', 'User created successfully!');

        // // Reset the form
        // $this->reset(['currentStep', 'username', 'email', 'password']);
    }


    public function render()
    {
        return view('livewire.multi-step-form');
    }
}
