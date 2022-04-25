<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_META_DESCRIPTION') }}">
    <meta name="author" content="{{ env('APP_META_AUTHOR') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="/xa/assets/images/favicon.png">
    <title>{{ env('APP_NAME') }}</title>
    <link href="/xa/dist/css/style.min.css" rel="stylesheet">
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
                    <div class="logo">
                        <span class="db"><img src="/xa/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium mb-3">Sign In to Admin</h5>
                    </div>
                    @yield('content')
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db"><img src="/xa/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium mb-3">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row mt-3">
                        <form class="col-12" action=".">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" required=""
                                        placeholder="Username">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/xa/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/xa/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/xa/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });

    </script>
</body>

</html>
