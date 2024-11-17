<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Master Admin</title>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
	<style type="text/css">
			/* nnc */
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #EFF4FF !important;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: white;
			
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #FCA204 !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #FCA204 !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #FCA204 !important;
		}
	</style>
</head>
<body>
  @php 
  	$info = \App\Models\Information::first();
  @endphp
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100  ">
			<div class="user_card">
				<div class="d-flex justify-content-center form_container">
					 <form method="post" action="{{ route('admin.postLogin')}}">
	        	@csrf
	            <h3 class="text-center"><strong>Login to Your account</strong></h3>
	            @if(session()->has('success'))
	        	<div class="alert alert-danger">
				   <p>{{session()->get('success')}}</p>
				</div>
				@endif
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input class="form-control @error('username') is-invalid @enderror" id="username" type="Username"  name="username" placeholder="Username" value="{{ (isset($_COOKIE['user'])) ? $_COOKIE['user'] : old('username') }}">
	            	@error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Password" value="{{ (isset($_COOKIE['pass'])) ? $_COOKIE['pass'] : old('password') }}">
	            	@error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
                              	<input class="form-check-input custom-control-input" id="customControlInline" type="checkbox" style="width: 10px; height: 10px;" name="remember" id="flexCheckDefault"  @if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])) checked @endif >
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>