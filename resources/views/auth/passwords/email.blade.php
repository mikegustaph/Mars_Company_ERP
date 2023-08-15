@extends('layouts.authApp')

@section('content')

<div class="login-container">

	<div class="login-header login-caret">

		<div class="login-content">

			<a href="index.html" class="logo">
				<img src="assets/images/logo@2x.png" width="120" alt="" />
			</a>

			<p class="description">Enter your email, and we will send the reset link.</p>

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

			<form method="post" role="form" id="" action="{{ route('password.update') }}">

				<div class="form-forgotpassword-success">
					<i class="entypo-check"></i>
					<h3>Reset email has been sent.</h3>
					<p>Please check your email, reset password link will expire in 24 hours.</p>
				</div>

				<div class="form-steps">

					<div class="step current" id="step-1">

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>

								<input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="off" />
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-login">
								Complete Registration
								<i class="entypo-right-open-mini"></i>
							</button>
						</div>

					</div>

				</div>

			</form>


			<div class="login-bottom-links">

				<a href="extra-login.html" class="link">
					<i class="entypo-lock"></i>
					Return to Login Page
				</a>

			</div>

		</div>

	</div>

</div>
@endsection
