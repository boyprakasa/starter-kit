<form action="{{ route('permohonan.second-view') }}" class="card">
    @csrf
    <input type="hidden" name="member_id" value="{{ auth()->user()->memberProfile->id }}">
    <div class="card-header bg-secondary text-white rounded">Data Pemohon</div>
    <div class="card-body">

        <div class="row clearfix">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Jenis Pemohon</label>
                    <select id="kdjenis" class="form-control select2" style="width:100%" onchange="cek_jenis();"
                        name="jns_pemohon" required>
                        <option value="" selected disabled>Pilih Jenis</option>
                        <option value="1">Pribadi</option>
                        <option value="2">Badan Hukum/Perusahaan</option>
                        <option value="3">Bentuk Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Bentuk Usaha</label>
                    <select class="form-control select2" style="width:100%" name="bntk_perusahaan" id="bntk_perusahaan"
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
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Jenis Perusahaan</label>
                    <select class="form-control select2" style="width:100%" name="jns_perusahaan" id="jns_perusahaan"
                        required>
                        <option value="" selected disabled>Pilih Jenis</option>
                        <option value="0">PMDN</option>
                        <option value="1">PMA</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>NIB</label>
                    <input type="text" class="form-control form-control-sm" name="nib">
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control form-control-sm" name="nm_perusahaan" id="nm_perusahaan"
                        placeholder="Nama Perusahaan" required>
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Direktur/Pimpinan</label>
                    <input type="text" class="form-control form-control-sm" name="nm_pj" id="nm_pj"
                        class="form-control form-control-sm" placeholder="Nama Direktur/Pimpinan">
                </div>
            </div>

            <div class="col-lg-3 full d-none">
                <div class="form-group">
                    <label>Alamat Direktur/Pimpinan</label>
                    <input type="text" class="form-control form-control-sm" name="alamat_pj" id="alamat_pj"
                        placeholder="Alamat sesuai KTP" required>
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
                    <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama"
                        required>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control form-control-sm" name="alamat" id="alamat"
                        placeholder="Alamat Lengkap" required>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select2" style="width:100%" name="provinsi" id="provinsi" required>
                        <option value="" selected disabled>Pilih Provinsi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Kota</label>
                    <select class="form-control select2" style="width:100%" name="kota" id="kota" required>
                        <option value="" selected disabled>Pilih Kota</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2" style="width:100%" name="kecamatan" id="kecamatan" required>
                        <option value="" selected disabled>Pilih Kecamatan</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Desa/Kelurahan</label>
                    <select class="form-control select2" style="width:100%" name="kelurahan" id="kelurahan" required>
                        <option value="" selected disabled>Pilih Desa/Kelurahan</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" class="form-control form-control-sm" name="npwp" id="npwp"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="NPWP 15 digit" maxlength="15">
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control form-control-sm" name="telepon" id="telp"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="Nomor Telepon (62)" maxlength="16">
                </div>
            </div>

            <div class="col-lg-3 d-none">
                <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control form-control-sm" name="fax" id="fax"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        placeholder="Nomor Fax (62)" maxlength="16">
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
                    <input type="text" class="form-control form-control-sm" name="jabatan" id="jabatan"
                        placeholder="Jabatan" required>
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
                            <input type="text" class="form-control form-control-sm" name="akta_no" id="akta_no"
                                placeholder="Nomor Akta" maxlength="13">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm" name="notaris" id="notaris"
                                placeholder="Nama Notaris">
                        </div>
                        <div class="col-lg-3">
                            <input type="date" id="tgl_akta" name="tgl_akta" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 full d-none">
                <div class="form-group">
                    <label>Akta Perubahan</label>
                    <div class="row clearfix">
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm" name="aktaa_no" id="aktaa_no"
                                placeholder="Nomor Akta" maxlength="13">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm" name="notarisa" id="notarisa"
                                placeholder="Nama Notaris">
                        </div>
                        <div class="col-lg-3">
                            <input type="date" id="tgl_aktaa" name="tgl_aktaa" class="form-control form-control-sm">
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

                </div>
            </div>

            <div class="col-lg-3 d-none">
                <input type="file" class="form-control" name="file_npwp" accept="application/pdf">
                <small class="badge badge-default badge-info form-text text-white float-left mb-2">Scan
                    NPWP</small>
            </div>

            <div class="col-lg-3 full d-none">
                <input type="file" class="form-control" name="file_nib" accept="application/pdf">
                <small class="badge badge-default badge-info form-text text-white float-left mb-2">Scan
                    NIB</small>
            </div>

            <div class="col-lg-3 full d-none">
                <input type="file" class="form-control" name="file_akta" accept="application/pdf">
                <small class="badge badge-default badge-info form-text text-white float-left mb-2">Scan
                    Akta
                    Pendirian</small>
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
    <script>
        // Cek Jenis Pemohon
        function cek_jenis() {
            var jn = kdjenis.value;
            $('.col-lg-3, .col-lg-12').removeClass('d-none');
            if (jn == '1') {
                $('.half').attr('style', 'display:block');
                $('.full').attr('style', 'display:none');
                $('.pjawab').attr('style', 'display:none');
                $('#lampiran-pemohon').attr('style', 'display:none');
                $('#fullname').attr('style', 'display:none');
                $('#bntk_perusahaan').removeAttr('required', false);
                $('#jns_perusahaan').removeAttr('required', false);
                $('#akta_no').removeAttr('required', false);
                $('#notaris').removeAttr('required', false);
                $('#tgl_akta').removeAttr('required', false);
                $('#nm_pj').removeAttr('required', false);
                $('#alamat_pj').removeAttr('required', false);
            } else if (jn == '2' || jn == '3') {
                $('.half').attr('style', 'display:none');
                $('.full').attr('style', 'display:block');
                $('.pjawab').attr('style', 'display:block');
                $('#lampiran-pemohon').attr('style', 'display:block');
                $('#fullname').attr('style', 'display:block');
                $('#bntk_perusahaan').removeAttr('required', true);
                $('#jns_perusahaan').removeAttr('required', true);
                $('#nama1').removeAttr('required', true);
                $('#akta_no').removeAttr('required', true);
                $('#notaris').removeAttr('required', true);
                $('#tgl_akta').removeAttr('required', true);
                $('#nm_pj').removeAttr('required', true);
                $('#alamat_pj').removeAttr('required', true);
            }
        }

        $(document).ready(function() {

            $('#provinsi').on('change', function() {
                var province_id = $(this).val();
                getCities(province_id, null);
            });

            $('#kota').on('change', function() {
                var city_id = $(this).val();
                getDistrict(city_id, null);
            });

            $('#kecamatan').on('change', function() {
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
                            $('#kota').html(options).val(kota);
                        } else {
                            $('#kota').html(options);
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
                            $('#kecamatan').html(options).val(kec);
                        } else {
                            $('#kecamatan').html(options);
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
                            $('#kelurahan').html(options).val(kec);
                        } else {
                            $('#kelurahan').html(options);
                        }
                    },
                });
            }
        });
    </script>
@endpush
