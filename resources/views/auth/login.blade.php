<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>UPSA IMS - Login</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

    <link href="{{ asset("static/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("static/plugins/perfectscroll/perfect-scrollbar.css") }}" rel="stylesheet">
    {{-- <link href="{{ asset("static/plugins/pace/pace.css") }}" rel="stylesheet"> --}}


    <!-- Theme Styles -->
    <link href="{{ asset("static/css/main.min.css") }}" rel="stylesheet">
    <link href="{{ asset("static/css/custom.css") }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background" style="background-image:url({{ asset('static/images/login_bkg2.jpg') }}); background-position:center; background-size:cover;"></div>

        <div class="app-auth-container">
            <div class="logo text-center">
                <img src="{{ asset('static/images/upsa-logoacbsp.png') }}" style="object-fit: cover;" class="" alt="">
                <a href="{{ route('home') }}" class="text-center" style="font-size: 1.6em;"> Internship Management Portal</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.</p>


            <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="username" :value="__('Username or Student ID')" />

                <x-input id="username" class="form-control m-b-md" id="signInEmail" type="username" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password"  class="form-control" id="signInPassword" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="btn btn-primary">{{ __('Log in') }}</x-button>
            </div>
        </form>


            {{-- <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email address</label>
                <input type="email" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com">

                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
            </div>

            <div class="auth-submit">
                <a href="#" class="btn btn-primary">Sign In</a>
                <a href="#" class="auth-forgot-password float-end">Forgot password?</a>
            </div> --}}
            <div class="divider"></div>
            <div class="auth-alts">
                <a href="#" class="auth-alts-google"></a>
                <a href="#" class="auth-alts-facebook"></a>
                <a href="#" class="auth-alts-twitter"></a>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset("static/plugins/jquery/jquery-3.5.1.min.js") }}"></script>
    <script src="{{ asset("static/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("static/plugins/perfectscroll/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("static/js/main.min.js") }}"></script>
    <script src="{{ asset("static/js/custom.js") }}"></script>
</body>

</html>
