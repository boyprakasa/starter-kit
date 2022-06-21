<form id="n1n01Form" action="{{ $n1n01->exists ? route('n1n01.update', $n1n01->id) : route('n1n01.store') }}"
    method="POST" enctype="application/x-www-form-urlencoded" class="card">
    @if ($n1n01->exists)
        @method('PUT')
    @endif
    <input type="hidden" name="applicant_id" value="{{ $n1n01->applicant_id ?? request()->applicant->id }}">
    <input type="hidden" name="service_id" value="{{ $n1n01->service_id ?? request()->service->id }}">
    <div class="card-header bg-success text-white rounded">Data Permohonan</div>
    <div class="card-body">
        <div class="row clearfix">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Nama Konsultan</label>
                    <input type="text" class="form-control form-control-sm" name="nama_konsultan"
                        value="{{ $n1n01->nama_konsultan }}" required>
                    <small class="text-danger err_msg_nama_konsultan"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" class="form-control form-control-sm" name="telp_konsultan"
                        value="{{ $n1n01->telp_konsultan }}" required>
                    <small class="text-danger err_msg_telp_konsultan"></small>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Alamat Konsultan</label>
                    <textarea class="form-control form-control-sm" name="alamat_konsultan" rows="1">{{ $n1n01->alamat_konsultan }}</textarea>
                    <small class="text-danger err_msg_alamat_konsultan"></small>
                </div>
            </div>
        </div>
        <hr>
        <div class="row clearfix">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Kategori Kegiatan</label><br>
                    <select class="form-control select2" style="width: 100%" name="kegiatan_id" required>
                        <option value="" selected disabled>Silahkan Pilih</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{ $kegiatan->id }}" @if ($kegiatan->id === $n1n01->kegiatan_id) selected @endif>
                                {{ $kegiatan->nama }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-danger err_msg_kegiatan_id"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Jenis Kegiatan</label>
                    <select class="form-control select2" style="width: 100%" name="jenis_kegiatan_id" disabled>
                        <option value="" selected disabled>Silahkan Pilih</option>
                    </select>
                    <small class="text-danger err_msg_jenis_kegiatan_id"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Luas Lahan</label>
                    <input type="text" class="form-control form-control-sm" name="luas_lahan" min="0"
                        value="{{ $n1n01->luas_lahan }}" required>
                    <small class="text-danger err_msg_luas_lahan"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Luas Bangunan</label>
                    <input type="text" class="form-control form-control-sm" name="luas_bangunan" min="0"
                        value="{{ $n1n01->luas_bangunan }}" required>
                    <small class="text-danger err_msg_luas_bangunan"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Jumlah Siswa</label>
                    <input type="number" class="form-control form-control-sm" name="jumlah_siswa" min="0"
                        value="{{ $n1n01->jumlah_siswa }}" required>
                    <small class="text-danger err_msg_jumlah_siswa"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Jumlah Kamar/Unit</label>
                    <input type="number" class="form-control form-control-sm" name="jumlah_unit" min="0"
                        value="{{ $n1n01->jumlah_unit }}" required>
                    <small class="text-danger err_msg_jumlah_unit"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Satuan Ruang Parkir (SRP)</label>
                    <input type="number" class="form-control form-control-sm" min="0" name="srp"
                        value="{{ $n1n01->srp }}" required>
                    <small class="text-danger err_msg_srp"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Volume Kendaraan (LHR)</label>
                    <input type="nmuber" class="form-control form-control-sm" min="0" name="lhr"
                        value="{{ $n1n01->lhr }}" required>
                    <small class="text-danger err_msg_lhr"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Kategori Bangkitan</label>
                    <select class="form-control select2" style="width: 100%" name="bangkitan_id" required>
                        <option value="" selected disabled>Silahkan Pilih</option>
                        @foreach ($bangkitans as $bangkitan)
                            <option value="{{ $bangkitan->id }}" @if ($bangkitan->id === $n1n01->bangkitan_id) selected @endif>
                                {{ $bangkitan->index . '. ' . $bangkitan->nama . ' (' . $bangkitan->deskripsi . ')' }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-danger err_msg_bangkitan_id"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Lokasi Kegiatan</label>
                    <input type="text" class="form-control form-control-sm" name="alamat_kegiatan"
                        value="{{ $n1n01->alamat_kegiatan }}" required>
                    <small class="text-danger err_msg_alamat_kegiatan"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Kecamatan</label>
                    <select class="form-control select2" style="width: 100%" name="district_id" required>
                        <option value="" selected disabled>Silahkan Pilih</option>
                        @foreach ($kecSda as $item)
                            <option value="{{ $item->id }}" @if ($item->id === $n1n01->district_id) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger err_msg_district_id"></small>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Kelurahan/Desa</label>
                    <select class="form-control select2" style="width: 100%" name="village_id" disabled required>
                        <option value="" selected disabled>Silahkan Pilih</option>
                    </select>
                    <small class="text-danger err_msg_village_id"></small>
                </div>
            </div>
            <div class="col-lg-6">
                <label for="">Uraian Kegiatan (Opsional)</label>
                <textarea name="uraian" class="form-control form-control-sm" rows="2">{{ $n1n01->uraian }}</textarea>
                <small class="text-danger err_msg_uraian"></small>
            </div>
            <div class="col-lg-6">
                <label for="">Narasi Lebar Akses Masuk dan Keluar</label>
                <textarea name="narasi_lbr_akses_io" class="form-control form-control-sm" rows="2">{{ $n1n01->narasi_lbr_akses_io }}</textarea>
                <small class="text-danger err_msg_narasi_lbr_akses_io"></small>
            </div>
        </div>
    </div>
    <div class="card-footer aggrement-before-submit">
        <button type="submit" class="btn btn-success float-right">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</form>

@push('sub-scripts')
    <script>
        $('.select2').select2();

        if ('{{ $n1n01->id }}') {
            jenisKegiatan('{{ optional($n1n01)->kegiatan_id }}', '{{ optional($n1n01)->jenis_kegiatan_id }}');
            kelurahan('{{ optional($n1n01)->district_id }}', '{{ optional($n1n01)->village_id }}');
        }

        $('select[name="kegiatan_id"]').on('change', function() {
            var kegiatan = $(this).val();
            jenisKegiatan(kegiatan, null)
        });

        $('select[name="district_id"]').on('change', function() {
            var kecamatan = $(this).val();
            kelurahan(kecamatan, null)
        });

        function jenisKegiatan(kegiatan, jenis) {
            $.ajax({
                url: "{{ route('jenis-kegiatan.by_kegiatan', ':id') }}".replace(':id', kegiatan),
                success: function(data) {
                    var options = '<option value="" selected disabled>Silahkan Pilih</option>';
                    $.each(data, function(key, value) {
                        options += '<option value="' + value.id + '">' + value.index + '. ' +
                            value.nama + '</option>';
                    });

                    if (jenis) {
                        $('select[name="jenis_kegiatan_id"]').attr('disabled', false).html(options).val(jenis);
                    } else {
                        $('select[name="jenis_kegiatan_id"]').attr('disabled', false).html(options);
                    }
                }
            });
        }

        function kelurahan(kecamatan, kelurahan) {
            $.ajax({
                url: "{{ route('kelurahan-sda.by_kecamatan', ':id') }}".replace(':id', kecamatan),
                success: function(data) {
                    var options = '<option value="" selected disabled>Silahkan Pilih</option>';
                    $.each(data, function(key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    if (kelurahan) {
                        $('select[name="village_id"]').attr('disabled', false).html(options).val(kelurahan);
                    } else {
                        $('select[name="village_id"]').attr('disabled', false).html(options);
                    }
                }
            });
        }

        $('#n1n01Form').on('submit', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            console.log(url);
            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    successAlert(data.message);
                    if (data.type === 'new') {
                        window.location.href = data.url;
                    }
                },
                error: function(xhr) {
                    dangerAlert(xhr.responseJSON.message);
                    var res = xhr.responseJSON;
                    if ($.isEmptyObject(res) == false) {
                        $.each(res.errors, function(key, value) {
                            $('.err_msg_' + key).text(value[0]);
                        });
                    }
                },
            });
        });
    </script>
@endpush
