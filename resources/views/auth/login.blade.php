<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
	<title>CRM LOGIN</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="">
	<meta name="robots" content="">


	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('loginpage/image/favicon.png') }}">
	<link href="{{ asset('loginpage/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('loginpage/css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>
<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-md-6 p-0 m-none position-relative" style="background: url('{{ asset('loginpage/image/close-up-male-hands-using-laptop-home.jpg') }}') center center;background-size: cover;background-repeat: no-repeat;">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                </div>

                <div class="col-md-6">
                    <div class="login">


                            <div class="col-md-7">
                                <div class="col-12 mb-4 d-flex justify-content-center">
                                    <h2>Eallisto Erp</h2>
                                </div>

									<div class="text-center mb-3 login-logo">

									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>

                                    @include('auth._message')


                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Email Input -->
                                        <div class="form-group">
                                            <label class="mb-1 form-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                            <!-- Display validation error for email -->
                                            @error('email')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Password Input -->
                                        <div class="mb-4 position-relative">
                                            <label class="mb-1 form-label">Password</label>
                                            <input type="password" id="dz-password" name="password" class="form-control" required>
                                            <span class="show-pass eye">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <!-- Display validation error for password -->
                                            @error('password')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary light btn-block">Sign Me In</button>
                                        </div>
                                    </form>

                                    {{-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="page-register.html">Sign up</a></p>
                                    </div> --}}

                            </div>


                </div>
            </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
	<script src="{{ asset('loginpage/global/global.min.js') }}"></script>
	<script src="{{ asset('loginpage/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('loginpage/js/custom.min.js') }}"></script>
    <script src="{{ asset('loginpage/js/deznav-init.js') }}"></script>
</body>

</html>
