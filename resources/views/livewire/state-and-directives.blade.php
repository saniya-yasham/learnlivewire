<div x-data="{
    sum: function(a, b) { return Number(a) + Number(b); },
    y: 30,
    open: false,
    result: 0,
    input1: '',
    input2: ''

}">
	{{-- Alpine re-renders a component only when state changes --}}
	{{-- x-model does a two way binding of data --}}

	Number 1: <input type="text" x-model="input1">
	<span x-text="input1"></span>
	<hr>
	Number 2: <input type="text" x-model="input2">
	<span x-text="input2"></span>


	<hr>
	<button @click="result = sum(input1,input2)">Sum and show the result</button>

	<h1 x-show="result" x-text="result"></h1>








	{{-- <button @click="open=!open">Toggle</button>
    <h1 x-show="open" x-text="y" x-transition></h1> --}}

	{{-- <template x-if="true">
		<h1 x-text="y"></h1>
	</template> --}}


</div>

{{-- 
x-data
x-text
x-show
x-if
x-transition
x-model
--}}
