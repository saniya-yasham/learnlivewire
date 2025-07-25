# Livewire Resource – Add User (Class 1)

- We are starting with User resource using Livewire
- First, we will build a simple "Add User" form (just the name field)

- Step 1: Create a Livewire component using subfolder
  php artisan make:livewire users/create

- This creates:
  - PHP class at app/Http/Livewire/Users/Create.php
  - Blade view at resources/views/livewire/users/create.blade.php

- Step 2: In the Livewire class, define public properties
  public $name;
  public $message;

- Public properties are automatically available in the Blade view
- wire:model binds the input to the PHP property in real-time

- Step 3: Create a form in the Blade view
  - Use <form> tag with wire:submit.prevent to handle submission
  - Prevents default form behavior (page reload)
  - This is better than using just wire:click for buttons

  <form wire:submit.prevent="save">
      <input type="text" wire:model="name">
      <button type="submit">Save</button>
  </form>

- Step 4: Add save() method in the class
  public function save() {
      \App\Models\User::create([
          'name' => $this->name,
      ]);
  }

- Step 5: Mass assignment must be enabled in the model
  - In User model:
    protected $fillable = ['name'];

- Step 6: Add validation to the form
  public function save() {
      $this->validate([
          'name' => 'required|min:3',
      ]);

      \App\Models\User::create([
          'name' => $this->name,
      ]);

      $this->message = "User added!";
      $this->name = ''; // Clear the input after save
  }

- $this->validate() is a built-in Livewire method to validate input fields

- Step 7: Optionally show success message
  - Create a new public $message
  - Use Blade conditional to show it

- Summary:
  - wire:model for live input binding
  - wire:submit.prevent for better form handling
  - save() to store user
  - validate() for input validation
  - Good practice: use <form> for clean structure
---

# Livewire Resource – Edit User (Class 2)

- In this class, we will edit an existing user's name
- We’ll load the user in the mount method and update their name

- Step 1: Create a Livewire component using subfolder
  php artisan make:livewire users/edit

- Step 2: Define public properties
  public $user;
  public $name;
  public $message;

- $user will store the User model
- $name will be used to bind the input

- Step 3: Use the mount() method to load user data
  - mount() is a special Livewire lifecycle method
  - It runs automatically when the component loads
  - Used for setting up initial state or receiving parameters

  public function mount($id) {
      $this->user = \App\Models\User::findOrFail($id);
      $this->name = $this->user->name;
  }

- Step 4: Create the Blade form using best practices
  <form wire:submit.prevent="update">
      <input type="text" wire:model="name">
      <button type="submit">Update</button>
  </form>

- Step 5: Define the update() method
  public function update() {
      $this->validate([
          'name' => 'required|min:3',
      ]);

      $this->user->name = $this->name;
      $this->user->save();

      $this->message = "User updated!";
  }

- Step 6: Optionally show a success message
  @if ($message)
      <p>{{ $message }}</p>
  @endif

- Summary:
  - mount() to load user on component initialization
  - wire:model to bind input
  - wire:submit.prevent to handle form properly
  - update() method to validate and save changes
  - Better to use <form> in real-world apps
