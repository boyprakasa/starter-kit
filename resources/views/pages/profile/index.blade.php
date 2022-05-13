@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center> <img src="/xa/assets/images/users/1.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-2">{{ auth()->user()->name }}</h4>
                            <h6 class="card-subtitle">
                                Bergabung pada {{ fullDateTime(auth()->user()->created_at) }}
                            </h6>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <small class="text-muted">Nama</small>
                        <h6>{{ auth()->user()->name }}</h6>
                        <small class="text-muted">Email</small>
                        <h6>{{ auth()->user()->email }}</h6>
                        <div class="map-box">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.3604633313457!2d112.66055952922598!3d-7.3041539694484365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fdae83ad0a19%3A0x437f1013e0499319!2sARTAVEL!5e0!3m2!1sid!2sid!4v1650597558758!5m2!1sid!2sid"
                                width="100%" height="175" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-xlg-9 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month"
                                role="tab" aria-controls="pills-setting" aria-selected="false">Pengaturan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel"
                            aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form id="formProfil" class="form-horizontal form-material"
                                    action="{{ route('admin.update', auth()->user()->id) }}" method="post">
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="col-md-12">Nama</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Nama Lengkap"
                                                class="form-control form-control-line" name="name"
                                                value="{{ auth()->user()->name }}">
                                            <span class="text-danger err_msg_name"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="example@admin.com"
                                                class="form-control form-control-line" name="email"
                                                value="{{ auth()->user()->email }}">
                                            <small class="text-danger">
                                                * Pastikan email benar untuk proses verifikasi.
                                            </small>
                                            <span class="text-danger err_msg_email"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Kata Sandi</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" class="form-control form-control-line">
                                            <span class="text-danger err_msg_password"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Konfirmasi Kata Sandi</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-line">
                                            <span class="text-danger err_msg_password_confirmation"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success submit">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('sub-scripts')
    @include('components.sweetalert-init')
    <script>
        $(document).on('click', '.submit', function(e) {

            e.preventDefault();

            var url = $('#formProfil').attr('action');

            $('input').removeClass('is-invalid').addClass('is-valid');
            $('[class*=err_msg_]').text('');

            $.ajax({
                type: 'POST',
                url: url,
                data: new FormData($('#formProfil')[0]),
                contentType: false,
                processData: false,
                success: function(result) {
                    successAlert(result.message);
                    $('input').removeClass('is-invalid, is-valid');
                },
                error: function(result) {
                    dangerAlert('Gagal disimpan!');
                    var errors = result.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('input[name=' + key + ']').addClass('is-invalid').removeClass(
                            'is-valid');
                        $('.err_msg_' + key).text(value);
                    });
                }
            });
        });
    </script>
@endpush
