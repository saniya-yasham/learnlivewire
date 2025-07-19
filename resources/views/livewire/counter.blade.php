<div x-data="{ x: 300, open: false }">
	Count = {{ $count }}
	<br>
	<button class="btn btn-primary" wire:click="increment">Increment</button>
	<button class="btn btn-primary" wire:click="decrement">Decrement</button>
	<p x-text="x">THis is para</p>


	<h1 x-show="open">Im h1 heading</h1>

	<button class="btn btn-primary" @click="
        new bootstrap.Modal($refs.myCustomModal).show()
    ">
		Open Modal
	</button>

	<div class="modal" tabindex="-1" x-ref="myCustomModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-body">
					<h1> Inside modal content</h1>
					<p x-text="x">THis is para</p>
					{{ $count }}
				</div>

			</div>
		</div>
	</div>

</div>

{{-- debouncing --}}

{{-- Events and actions

events = click, mouseover, mouseleave, etc.
action =  function  --}}
