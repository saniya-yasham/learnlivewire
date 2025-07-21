<div class="container mt-5" x-data="usernameChecker()">
	<form class="bg-light rounded border p-4 shadow-sm" action="" x-show="">
		<div class="mb-3">
			<label class="form-label" for="username">Username:</label>
			<input class="form-control" id="username" name="username" type="text" x-model="username"
				@input="checkUsernameAvailability">

			<span class="d-block mt-2 text-sm" x-bind:class="isUsernameAvailable ? 'text-success' : 'text-danger'" x-text="message">
			</span>
		</div>
	</form>
</div>

<script>
	function usernameChecker() {
		return {
			username: '',
			message: '',
			takenUsernames: @js($takenUsernames),
			isUsernameAvailable: false,

			checkUsernameAvailability() {
				if (this.takenUsernames.includes(this.username)) {
					this.message = 'Username already taken: ' + this.username;
					this.isUsernameAvailable = false;
				} else {
					this.message = 'Username available: ' + this.username;
					this.isUsernameAvailable = true;
				}
			}
		};
	}
</script>
