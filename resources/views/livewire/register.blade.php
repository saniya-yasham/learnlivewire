<div x-data='checkUsernameAvailability()'>
	{{-- @dd($takenUsernames); --}}
	<p x-text="inputValue"></p>
	<input name="username" type="text" autocomplete="off" x-model="inputValue" @input="checkUsername()">
	<p class="bg-dark" x-bind:class="isAvailable ? 'text-success' : 'text-danger'" x-text="message"></p>
	<button >Check Availability</button>
</div>


<script>
	function checkUsernameAvailability() {
		return {
			takenUsernames: @js($takenUsernames),
			inputValue: "",
			message: "",
			isAvailable: false,
			checkUsername() {
				if (this.takenUsernames.includes(this.inputValue)) {
					this.message = "Username is not available";
					this.isAvailable = false;
				} else {
					this.message = "Username available";
					this.isAvailable = true;
				}
			}
		}
	}
</script>
