@if (session('success'))
	<div class="alert alert-success" role="alert">{{ session('success') }}</div>
@endif

@if (session('error'))
	<div class="alert alert-danger" role="alert">{{ session('error') }}</div>
@endif

@if($errors->any())
	<div class="mt-4">
		<div class="alert alert-danger" role="alert">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</div>
	</div>
@endif
