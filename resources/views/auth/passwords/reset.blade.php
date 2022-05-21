@extends('layouts.auth')

@section('content')
    <div class="logo">
        <span class="db"><img src="https://artavel.co.id/images/templatemo_logo.png" height="60"
                alt="logo" /></span>
        <h5 class="font-medium mt-2 mb-3">Atur Ulang Kata Sandi</h5>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger mt-3 d-none">
                <center>
                    <span class="text-danger err_msg_email"></span>
                    <span class="text-danger err_msg_password"></span>
                </center>
            </div>
            <form class="resetForm mt-3" method="POST" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="email" name="email" value="{{ $email }}"
                            required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="password" name="password"
                            placeholder="Kata Sandi Baru" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="password" name="password_confirmation"
                            placeholder="Konfirmasi Kata Sandi Baru" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Kirim
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('password-script')
    <script>
        $('.resetForm').submit(function(e) {
            e.preventDefault();

            $('.alert-danger').addClass('d-none')
            $('.text-danger').text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('password.update') }}",
                data: new FormData($(this)[0]),
                processData: false,
                contentType: false,
                success: function(data) {
                    successAlert('Berhasil!', data.message);
                    window.location.replace("{{ route('home') }}");
                },
                error: function(data) {
                    $('.alert-danger').removeClass('d-none');
                    dangerAlert(data.responseJSON.message);
                    var errors = data.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.err_msg_' + key).text(value);
                    });
                }
            });
        });
    </script>
    </script>
@endpush
