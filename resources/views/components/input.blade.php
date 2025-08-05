@props(['label' => null, 'disabled' => false, 'name' => 'null', 'required' => false])

<label {{ $attributes->merge(['class' => 'form-label mt-3']) }}>
	@if ($required)
		<span class="text-danger">*</span>
	@endif
	{{ $label }}
</label>

<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')]) }}>

@error($name)
	<div class="invalid-feedback">
		{{ $message ?? '' }}
	</div>
@enderror
