@extends('layouts.authApp')

@section('content')

<div class="login-container">

	<div class="login-header login-caret">

		<div class="login-content">

			<a href="{{ url('/') }}" class="logo">

               <img src="{{ Storage::url('images/'.$logo) }}" width="150px" height="auto" alt="logo"/>
			</a>
			<p class="description">Dear user, log in to access the admin area!</p>

			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>

	</div>

	<div class="login-progressbar">
		<div></div>
	</div>

	<div class="login-form">

		<div class="login-content">
			<form method="post" role="form" id="form_login" action="{{ route('login') }}">
                @csrf
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>

						<input type="emaphpil" class="form-control @error('email') is-invalid @enderror" name="email" id="username" placeholder="Email" autocomplete="off" name="email" value="{{ old('email') }}" required autofocus />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" name="password" id="password" placeholder="Password" autocomplete="off" />
                        @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                        @enderror
					</div>

				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        {{ __('Login') }}
                    </button>

				</div>



			</form>

			<div class="login-bottom-links">
                @if (Route::has('login'))
                   <a href="{{ url('/reset') }}" class="link">Forgot your password?</a>
                @endif
			</div>

		</div>

	</div>

</div>
@endsection
