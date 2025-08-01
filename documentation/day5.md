# Simple Multi-Step User Registration Form with Livewire v3

## Objective
Build a two-step user registration form with Livewire v3 including:
- Step tracking
- Validation per step
- Avatar upload with preview
- Saving to database

---

## Step 1: Create Component
```bash
php artisan make:livewire MultiStepForm
php artisan storage:link
```
## Step 2: Component Code (app/Livewire/MultiStepForm.php)
```php
<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $name;
    public $email;
    public $password;
    public $avatar;
    public $address;
    public $city;
    public $successMessage = '';

    public function nextStep()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'avatar' => 'nullable|image|max:1024',
        ]);

        $this->currentStep = 2;
    }

    public function previousStep()
    {
        $this->currentStep = 1;
    }

    public function submit()
    {
        $this->validate([
            'address' => 'required',
            'city' => 'required',
        ]);

        $avatarPath = null;
        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $avatarPath,
        ]);

        $this->reset(['name', 'email', 'password', 'avatar', 'address', 'city']);
        $this->currentStep = 1;
        $this->successMessage = 'User created successfully!';
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }
}
```
## Step 3: Blade View
```php
<div class="max-w-xl mx-auto bg-white shadow rounded p-6 space-y-6">
    <h1 class="text-2xl font-bold">Multi-Step Registration</h1>

    @if ($successMessage)
        <div class="bg-green-100 border border-green-400 text-green-800 p-2 rounded">
            {{ $successMessage }}
        </div>
    @endif

    <div class="flex gap-2">
        <div class="flex-1 text-center py-2 rounded {{ $currentStep === 1 ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">Step 1</div>
        <div class="flex-1 text-center py-2 rounded {{ $currentStep === 2 ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">Step 2</div>
    </div>

    @if ($currentStep === 1)
      ...// input fields
    @endif

    @if ($currentStep === 2)
       ..//next input fields
    @endif

    <div class="flex justify-between mt-4">
        @if ($currentStep > 1)
            <button wire:click="previousStep" class="px-4 py-2 bg-gray-300 rounded">Previous</button>
        @endif
        @if ($currentStep === 1)
            <button wire:click="nextStep" class="px-4 py-2 bg-blue-600 text-white rounded">Next</button>
        @else
            <button wire:click="submit" class="px-4 py-2 bg-green-600 text-white rounded">Submit</button>
        @endif
    </div>
</div>

```
## Step 4: Route (routes/web.php)
`Route::get('/register-multi', MultiStepForm::class)->name('multi.register');`

### Notes
- Validation per step keeps UX smooth.
- WithFileUploads enables avatar upload & preview.
- Resetting properties after save clears the form.
- This is the minimal structure; styling is basic.
