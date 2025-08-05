<div>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Multi-Step Form</h1>

				@if (session('users.create'))
					<div class="alert alert-success">
						{{ session('users.create') }}
					</div>
				@endif
				{{-- @dd($currentStep); --}}
				{{-- Hash::make --}}

				@if ($currentStep == 1)
					<x-input name="username" type="text" label="UserName" :required="true" wire:model.blur="username"
						autocomplete="off" />
					<x-input name="email" type="email" label="Email" :required="true" wire:model.blur="email"
						autocomplete="off" />
				@endif

				@if ($currentStep == 2)
					<x-input name="password" type="password" label="Password" :required="true" wire:model="password"
						autocomplete="off" />

					<x-input name="confirm_password" type="password" label="Confirm Password" :required="true"
						wire:model="confirm_password" autocomplete="off" />
				@endif

				@if ($currentStep == 3)
					<x-input name="avatar" type="file" label="Avatar" :required="false" wire:model="avatar" />
				@endif

				<div class="d-flex justify-content-center mt-3 gap-2">
					@if ($currentStep > 1)
						<button class="btn btn-secondary" wire:click="previousStep">Previous</button>
					@endif
					<button class="btn btn-primary" wire:click="nextStep" @disabled($currentStep == $lastStep)>Next</button>
				</div>
				<div class="d-flex justify-content-between gap-2">
					@if ($currentStep == $lastStep)
						<button class="btn btn-success w-25" wire:click="save">Save</button>
					@endif
					<button class="btn btn-outline-dark" type="reset">Reset</button>
				</div>
			</div>
		</div>
	</div>
</div>
