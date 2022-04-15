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

            <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-3">
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="form-control" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Email -->
            <div class="mt-3">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="text" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Phone Address -->
            <div class="mt-3">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="form-control" type="phone" name="phone" :value="old('phone')" required />
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-3">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 btn btn-success">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>


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
