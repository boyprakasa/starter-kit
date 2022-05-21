@extends('layouts.auth')

@section('content')
    <div class="logo">
        <span class="db"><img src="/xa/assets/images/logo-icon.png" alt="logo" /></span>
        <h5 class="font-medium mb-3">Halaman Login</h5>
        <span>Belum punya akun? <a href="{{ route('register') }}" class="label label-info">Daftar</a></span>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger mt-3 d-none">
                <center>
                    <span class="text-danger err_msg_email"></span>
                </center>
            </div>
            <form class="form-horizontal mt-3 loginform" method="POST" action="{{ route('login') }}"
                enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-email"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="email" aria-label="Email"
                            name="email" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg " placeholder="Password"
                            aria-label="Password" required>
                    </div>
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
                        <button type="button" class="btn btn-block btn-lg btn-info submit">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('login-script')
    <script>
        $(document).on('click', '.submit', function(e) {
            e.preventDefault();

            $('.alert-danger').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ route('login') }}",
                data: new FormData($('.loginform')[0]),
                contentType: false,
                processData: false,
                success: function(data) {
                    successAlert(data.message);
                    window.location.replace("{{ route('home') }}");
                },
                error: function(data) {
                    $('.alert-danger').removeClass('d-none');
                    dangerAlert(data.responseJSON.message);
                    if (data.status === 401) {
                        $('input[name=_token]').val(data.responseJSON.csrf_token);
                    }
                    var errors = data.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.err_msg_' + key).text(value);
                    });
                }
            });
        });
    </script>
@endpush
