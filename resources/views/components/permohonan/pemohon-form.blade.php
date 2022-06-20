<form id="pemohonForm" action="{{ route('permohonan.second-submit', ['service' => request()->service]) }}" method="POST"
    enctype="application/x-www-form-urlencoded" class="card">
    <input type="hidden" name="service_id" value="{{ request('service')->id }}">
    <input type="hidden" name="member_id" value="{{ auth()->user()->memberProfile->id }}">
    <div class="card-header bg-secondary text-white rounded">Data Pemohon</div>
    <div class="card-body">

        <div class="row clearfix">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Jenis Pemohon</label>
                    <select class="form-control select2 jns_pemohon" style="width:100%" name="jns_pemohon" required>
                        <option value="" selected disabled>Pilih Jenis</option>
                        <option value="1">Pribadi</option>
                        <option value="2">Badan Hukum/Perusahaan</option>
                        <option value="3">Bentuk Lainnya</option>
                    </select>
                    <small class="text-danger err_msg_jns_pemohon"></small>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Bentuk Usaha</label>
                    <select class="form-control select2 bntk_perusahaan" style="width:100%" name="bntk_perusahaan"
                        required>
                        <option value="" selected disabled>Pilih Bentuk</option>
                        <option value="1">Perseroan Terbatas (PT)</option>
                        <option value="2">Perseroan Terbatas Belum Berbadan Hukum</option>
                        <option value="3">Persekutuan Comanditer (CV)</option>
                        <option value="4">Firma (FA)</option>
                        <option value="5">Koperasi</option>
                        <option value="6">Perusahaan Perorangan</option>
                        <option value="7">Bentuk Perusahaan Lainya</option>
                    </select>
                    <small class="text-danger err_msg_bntk_perusahaan"></small>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Jenis Perusahaan</label>
                    <select class="form-control select2 jns_perusahaan" style="width:100%" name="jns_perusahaan"
                        required>
                        <option value="" selected disabled>Pilih Jenis</option>
                        <option value="0">PMDN</option>
                        <option value="1">PMA</option>
                    </select>
                    <small class="text-danger err_msg_jns_perusahaan"></small>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>NIB</label>
                    <input type="text" class="form-control form-control-sm" name="nib">
                </div>
                <small class="text-danger err_msg_nib"></small>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control form-control-sm nm_perusahaan" name="nm_perusahaan"
                        placeholder="Nama Perusahaan">
                    <small class="text-danger err_msg_nm_perusahaan"></small>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Direktur/Pimpinan</label>
                    <input type="text" class="form-control form-control-sm nm_pj" name="nm_pj"
                        class="form-control form-control-sm" placeholder="Nama Direktur/Pimpinan">
                    <small class="text-danger err_msg_nm_pj"></small>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Alamat Direktur/Pimpinan</label>
                    <input type="text" class="form-control form-control-sm alamat_pj" name="alamat_pj"
                        placeholder="Alamat sesuai KTP" required>
                    <small class="text-danger err_msg_alamat_pj"></small>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" class="form-control form-control-sm" name="nik"
                        value="{{ auth()->user()->memberProfile->identity_number }}" readonly>
                </div>
            </div>

            <div class="col-lg-3 half d-none">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control form-control-sm nama" name="nama" placeholder="Nama"
                        required>
                    <small class="text-danger err_msg_nama"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control form-control-sm" name="alamat" id="alamat"
                        placeholder="Alamat Lengkap" required>
                    <small class="text-danger err_msg_alamat"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select2 province_id" style="width:100%" name="province_id" required>
                        <option value="" selected disabled>Pilih Provinsi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger err_msg_province_id"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Kota</label>
                    <select class="form-control select2 city_id" style="width:100%" name="city_id" required>
                        <option value="" selected disabled>Pilih Kota</option>
                    </select>
                    <small class="text-danger err_msg_city_id"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2 district_id" style="width:100%" name="district_id" required>
                        <option value="" selected disabled>Pilih Kecamatan</option>
                    </select>
                    <small class="text-danger err_msg_district_id"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Desa/Kelurahan</label>
                    <select class="form-control select2 village_id" style="width:100%" name="village_id" required>
                        <option value="" selected disabled>Pilih Desa/Kelurahan</option>
                    </select>
                    <small class="text-danger err_msg_village_id"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" class="form-control form-control-sm npwp" name="npwp"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="NPWP 15 digit" maxlength="15">
                    <small class="text-danger err_msg_npwp"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control form-control-sm telepon" name="telepon"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="Nomor Telepon (62)" maxlength="16">
                    <small class="text-danger err_msg_telepon"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control form-control-sm fax" name="fax"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="Nomor Fax (62)" maxlength="16">
                    <small class="text-danger err_msg_fax"></small>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control form-control-sm" name="email"
                        value="{{ auth()->user()->email }}" readonly>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control form-control-sm jabatan" name="jabatan"
                        placeholder="Jabatan" required>
                    <small class="text-danger err_msg_jabatan"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2" style="width:100%" name="gender_pj" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label>No. Hp</label>
                    <input type="text" class="form-control form-control-sm" name="no_hp"
                        value="{{ auth()->user()->memberProfile->phone }}" readonly>
                </div>
            </div>

            <div class="col-lg-12 full d-none">
                <hr>
            </div>
            <div class="col-lg-12 full d-none">
                <div class="form-group">
                    <label>Akta Pendirian</label>
                    <div class="row clearfix">
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm akta_no" name="akta_no"
                                placeholder="Nomor Akta" maxlength="13">
                            <small class="text-danger err_msg_akta_no"></small>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm notaris" name="notaris"
                                placeholder="Nama Notaris">
                            <small class="text-danger err_msg_notaris"></small>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" class="form-control form-control-sm tgl_akta" name="tgl_akta">
                            <small class="text-danger err_msg_tgl_akta"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 full d-none">
                <div class="form-group">
                    <label>Akta Perubahan</label>
                    <div class="row clearfix">
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm aktaa_no" name="aktaa_no"
                                placeholder="Nomor Akta" maxlength="13">
                            <small class="text-danger err_msg_aktaa_no"></small>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm notarisa" name="notarisa"
                                placeholder="Nama Notaris">
                            <small class="text-danger err_msg_notarisa"></small>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" name="tgl_aktaa" class="form-control form-control-sm tgl_aktaa">
                            <small class="text-danger err_msg_tgl_aktaa"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 d-none">
                <hr>
                <label>Lampiran</label>
            </div>
            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <input type="file" class="form-control" name="file_ktp" accept="application/pdf">
                    <small class="badge badge-default badge-info form-text text-white float-left mb-2">Scan
                        KTP</small>
                    <small class="text-danger err_msg_file_ktp"></small>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <input type="file" class="form-control" name="file_npwp" accept="application/pdf">
                <small class="badge badge-default badge-info form-text text-white float-left mb-2">Scan
                    NPWP</small>
                <small class="text-danger err_msg_file_npwp"></small>
            </div>

            <div class="col-lg-3 full d-none">
                <input type="file" class="form-control" name="file_nib" accept="application/pdf">
                <small class="badge badge-default badge-info form-text text-white float-left mb-2">Scan
                    NIB</small>
                <small class="text-danger err_msg_file_nib"></small>
            </div>

            <div class="col-lg-3 full d-none">
                <input type="file" class="form-control" name="file_akta" accept="application/pdf">
                <small class="badge badge-default badge-info form-text text-white float-left mb-2">Scan
                    Akta
                    Pendirian</small>
                <small class="text-danger err_msg_file_akta"></small>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-success float-right">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</form>

@push('sub-scripts')
    @include('components.sweetalert-init')
    <script>
        $(document).ready(function() {

            $('#pemohonForm').on('submit', function(e) {
                e.preventDefault();

                var url = $(this).attr('action');

                $('input').removeClass('is-invalid is-valid');
                $('[class*=err_msg_]').text('');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        successAlert('Berhasil', 'Data berhasil disimpan');
                        window.location.href = res.url;
                    },
                    error: function(res) {
                        dangerAlert('Gagal disimpan!', res.responseJSON.message);
                        var err = res.responseJSON.errors;
                        $.each(err, function(i, v) {
                            $('.' + i).addClass('is-invalid');
                            $('.err_msg_' + i).text(v);
                        });
                    },
                });
            })

            // Cek Jenis Pemohon
            $('.jns_pemohon').on('change', function() {
                var jn = this.value;
                $('.col-lg-3, .col-lg-12').removeClass('d-none');
                if (jn == '1') {
                    $('.half').attr('style', 'display:block');
                    $('.full, .pjawab').attr('style', 'display:none');

                    $('.nm_perusahaan, .bntk_perusahaan, .jns_perusahaan, .akta_no, .notaris, .tgl_akta, .nm_pj, .alamat_pj')
                        .removeAttr('required', false);
                } else if (jn == '2' || jn == '3') {
                    $('.half').attr('style', 'display:none');
                    $('.full, .pjawab').attr('style', 'display:block');

                    $('.nm_perusahaan, .bntk_perusahaan, .jns_perusahaan, .akta_no, .notaris, .tgl_akta, .nm_pj, .alamat_pj')
                        .removeAttr('required', true);
                }
            });

            $('.province_id').on('change', function() {
                var province_id = $(this).val();
                getCities(province_id, null);
            });

            $('.city_id').on('change', function() {
                var city_id = $(this).val();
                getDistrict(city_id, null);
            });

            $('.district_id').on('change', function() {
                var district_id = $(this).val();
                getVillage(district_id, null);
            });

            function getCities(prov, kota) {
                $.ajax({
                    url: "{{ route('kabupaten', ':id') }}".replace(':id', prov),
                    success: function(result) {
                        var options =
                            '<option value="" selected disabled>Pilih Kota</option>';
                        options += result.map(function(val, ind) {
                            return `<option value="${val.id}">${val.name}</option>`;
                        });
                        if (kota) {
                            $('.city_id').html(options).val(kota);
                        } else {
                            $('.city_id').html(options);
                        }
                    },
                });
            }

            function getDistrict(kota, kec) {
                $.ajax({
                    url: "{{ route('kecamatan', ':id') }}".replace(':id', kota),
                    success: function(result) {
                        var options =
                            '<option value="" selected disabled>Pilih Kecamatan</option>';
                        options += result.map(function(val, ind) {
                            return `<option value="${val.id}">${val.name}</option>`;
                        });
                        if (kec) {
                            $('.district_id').html(options).val(kec);
                        } else {
                            $('.district_id').html(options);
                        }
                    },
                });
            }

            function getVillage(kec, kel) {
                $.ajax({
                    url: "{{ route('kelurahan', ':id') }}".replace(':id', kec),
                    success: function(result) {
                        var options =
                            '<option value="" selected disabled>Pilih Desa/Kelurahan</option>';
                        options += result.map(function(val, ind) {
                            return `<option value="${val.id}">${val.name}</option>`;
                        });
                        if (kec) {
                            $('.village_id').html(options).val(kec);
                        } else {
                            $('.village_id').html(options);
                        }
                    },
                });
            }
        });
    </script>
@endpush
