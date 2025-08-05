<div>

	@if (session('users.create'))
		<div class="alert alert-success">
			{{ session('users.create') }}
		</div>
	@endif

	<input name="username" type="text" wire:model="username" autocomplete="off">
	<button class="btn btn-primary" wire:click="save">Save</button>
	<p>{{ $message }}</p>
	<ul>
		{{-- @if ($takenUsernames)
			@foreach ($takenUsernames as $takenUsername)
				<li>{{ $takenUsername }}</li>
			@endforeach
		@else
			<li>No usernames</li>
		@endif --}}

		@forelse ($takenUsernames as $takenUsername)
			<li>{{ $takenUsername }}</li>
		@empty
			<li>No usernames</li>
		@endforelse
	</ul>
</div>
