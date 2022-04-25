@extends('layouts.auth')

@section('content')
	<div class="row">
		<div class="col-12">
			<form class="form-horizontal mt-3" id="loginform" method="post" action="{{ route('login') }}">
				@csrf
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
					</div>
					<input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="email"
						   aria-label="Email" name="email" required aria-describedby="basic-addon1">
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
					</div>
					<input type="password" name="password" required class="form-control form-control-lg @error('password') is-invalid @enderror"
						   placeholder="Password"
						   aria-label="Password" aria-describedby="basic-addon1">
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $password }}</strong>
							</span>
						@enderror
				</div>
				<div class="form-group row">
					<div class="col-md-12">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<a href="{{ route('password.request') }}" id="to-recover" class="text-dark float-right"><i
									class="fa fa-lock mr-1"></i> Lupa Password?</a>
						</div>
					</div>
				</div>
				<div class="form-group text-center">
					<div class="col-xs-12 pb-3">
						<button class="btn btn-block btn-lg btn-info" type="submit">Masuk</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
