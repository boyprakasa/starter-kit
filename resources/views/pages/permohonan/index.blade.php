@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 order-lg-0 order-0">
                {{-- Step 1 --}}
                <x-permohonan.layanan-form />
            </div>

            <div class="col-lg-8 order-lg-1 order-1">
                {{-- Step 2 --}}
                @if (request()->routeIs('permohonan.second-view'))
                    @if (request()->pemohon)
                        <x-permohonan.pemohon-view />
                    @else
                        <x-permohonan.pemohon-form />
                    @endif
                @endif
            </div>

            <div class="col-lg-4 order-lg-2 order-3">
                {{-- Step 4 --}}
                <x-permohonan.riwayat-view />
                <x-permohonan.persyaratan-form />
            </div>

            <div class="col-lg-8 order-lg-3 order-2">
                {{-- Step 3 --}}
                <form action="" class="card d-none">
                    <div class="card-header bg-success text-white rounded">Data Permohonan</div>
                    <div class="card-body">
                        <div class="row clearfix">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Nama Konsultan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">No. Telepon</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Alamat Konsultan</label>
                                    <textarea class="form-control" name="" rows="1"></textarea>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row clearfix">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Kategori Kegiatan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Jenis Kegiatan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Luas Lahan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Luas Bangunan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Jumlah Siswa</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Jumlah Kamar/Unit</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Satuan Ruang Parkir (SRP)</label>
                                    <input type="number" class="form-control" min="0" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Volume Kendaraan (LHR)</label>
                                    <input type="nmuber" class="form-control" min="0" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Kategori Bangkitan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Lokasi Kegiatan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Kecamatan</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Kelurahan/Desa</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <span class="text-danger err_msg_name">Message Failed</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Uraian Kegiatan (Opsional)</label>
                                <textarea name="" class="form-control" rows="1"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Narasi Lebar Akses Masuk dan Keluar</label>
                                <textarea name="" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-12 order-lg-4 order-4">
                <x-permohonan.aggrement-form />
            </div>

        </div>
    </div>
@endsection

@push('sub-scripts')
    <script>
        $('.select2').select2();
    </script>
@endpush
