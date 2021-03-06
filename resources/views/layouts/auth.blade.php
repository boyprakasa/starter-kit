<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_META_DESCRIPTION') }}">
    <meta name="author" content="{{ env('APP_META_AUTHOR') }}">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="https://artavel.co.id/images/favicon.png">
    <title>{{ env('APP_NAME') }}</title>
    @include('components.styles')
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url(/xa/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

@include('components.scripts')
@include('components.sweetalert-init')
@stack('login-script')
@stack('register-script')
@stack('password-script')

</html>
