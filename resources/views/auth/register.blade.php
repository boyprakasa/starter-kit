@extends('layouts.auth')

@section('content')
    <div class="logo">
        <span class="db"><img src="https://artavel.co.id/images/templatemo_logo.png" height="60"
                alt="logo" /></span>
        <h5 class="font-medium mb-3"></h5>
        <span>Sudah punya akun? <a href="{{ route('login') }}" class="label label-success">Masuk</a></span>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal mt-3 loginform" method="POST" action="{{ route('register') }}"
                enctype="application/x-www-form-urlencoded" novalidate>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-user"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="Nama" name="name" required>
                    </div>
                    <span class="text-danger err_msg_name"></span>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-credit-card"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="NIK" name="identity_number"
                            required>
                    </div>
                    <span class="text-danger err_msg_identity_number"></span>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-email"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
                    </div>
                    <span class="text-danger err_msg_email"></span>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-mobile"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="No. Handphone" name="phone"
                            required>
                    </div>
                    <span class="text-danger err_msg_phone"></span>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-flickr"></i></span>
                        </div>
                        <select class="form-control form-control-lg" name="gender" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <span class="text-danger err_msg_gender"></span>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-lock"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" placeholder="Kata Sandi" name="password"
                            required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ti-key"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" placeholder="Konfirmasi Kata Sandi"
                            name="password_confirmation" required>
                    </div>
                    <span class="text-danger err_msg_password"></span>
                </div>

                <div class="form-group text-center">
                    <div class="col-xs-12 pb-3">
                        <button type="button" class="btn btn-block btn-lg btn-success submit">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('register-script')
    <script>
        $(document).on('click', '.submit', function(e) {
            e.preventDefault();

            $('.text-danger').text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('register') }}",
                data: new FormData($('.loginform')[0]),
                contentType: false,
                processData: false,
                success: function(data) {
                    successAlert(data.message);
                    window.location.replace("{{ route('verification.notice') }}");
                },
                error: function(data) {
                    var errors = data.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.err_msg_' + key).text(value);
                    });
                }
            });
        });
    </script>
@endpush
