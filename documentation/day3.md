<div x-data='checkUsernameAvailability()'>
	<div class="container mt-5 pt-5">
		<div class="row">
			<div class="col">

				<p x-text="input"></p>
				<input class="form-input" name="username" type="text" x-model="input" @input="checkAvailability()" autocomplete="off">
				{{-- <button class="btn btn-primary" @click="checkAvailability()">Check Availability</button> --}}

				<p class="bg-dark" x-bind:class="isAvailable ? 'text-success' : 'text-danger'" x-text="message"></p>


			</div>
		</div>
	</div>
	{{-- @dd($takenUsernames); --}}

</div>


<script>
	function checkUsernameAvailability() {
		return {
			takenUsernames: @js($takenUsernames),
			message: "",
			input: "",
			isAvailable: false,

			checkAvailability() {
				if (this.takenUsernames.includes(this.input)) {
					this.message = "Username not available";
					this.isAvailable = false;
				} else if (this.input.trim() === '') {
					this.message = "Please enter a username";
					this.isAvailable = false;

				} else {
					this.message = "Available!";
					this.isAvailable = true;

				}
			}

		}
	}
</script>


class Register extends Component
{
    public $takenUsernames = [];

    public function mount()
    {
        $this->takenUsernames = User::pluck('username')->toArray();
    }

    public function render()
    {
        return view('livewire.register');
    }
}
