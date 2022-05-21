@extends('layouts.auth')

@section('content')
    <div class="logo">
        <span class="db"><img src="https://artavel.co.id/images/templatemo_logo.png" alt="logo" /></span>
        <h5 class="font-medium mb-3">Atur Ulang Kata Sandi</h5>
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
