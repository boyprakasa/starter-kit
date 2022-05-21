@extends('layouts.auth')

@section('content')
    <div class="logo">
        <span class="db"><img src="https://artavel.co.id/images/templatemo_logo.png" height="60"
                alt="logo" /></span>
        <h5 class="font-medium mt-3 mb-3">Atur Ulang Kata Sandi</h5>
        <span>Tautan atur ulang kata sandi akan dikirim lewat email!</span>
    </div>
    <div class="row mt-3">
        <form class="resetForm col-12" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="form-group row">
                <div class="col-12">
                    <input class="form-control form-control-lg" type="email" name="email" required
                        placeholder="Email terdaftar">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Kirim
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-block btn-lg btn-info">Masuk Aplikasi</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('password-script')
    <script>
        $('.resetForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('password.email') }}",
                data: new FormData($(this)[0]),
                processData: false,
                contentType: false,
                success: function(data) {
                    successAlert('Berhasil!', data.message);
                },
                error: function(data) {
                    dangerAlert('Gagal!', data.responseJSON.message);
                }
            });
        });
    </script>
@endpush
