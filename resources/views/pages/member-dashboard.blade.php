@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-3">
                <a href="">
                    <div class="card bg-success card-hover">
                        <div class="card-body text-white">
                            <div class="row">
                                <div class="col-2 mt-1">
                                    <i class="fas fa-file-alt fa-3x"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="card-title">Permohonan</h4>
                                    Pengajuan permohonan baru.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <div class="card bg-warning card-hover">
                    <div class="card-body text-white">
                        <div class="row">
                            <div class="col-2 mt-1">
                                <i class="fas fa-bell-slash fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <h4 class="card-title">Pemberitahuan</h4>
                                Pemberitahuan permohonan selesai & revisi.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-danger card-hover">
                    <div class="card-body text-white">
                        <div class="row">
                            <div class="col-2 mt-1">
                                <i class="fas fa-download fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <h4 class="card-title">Download</h4>
                                Download buku panduan & lain-lain.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-info card-hover">
                    <div class="card-body text-white">
                        <div class="row">
                            <div class="col-2 mt-1">
                                <i class="fas fa-info-circle fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <h4 class="card-title">Informasi</h4>
                                Informasi terkait aplikasi & pelayanan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header border-bottom title-part-padding">
                        <div class="d-flex justify-content-between align-content-center">
                            <h5 class="card-title mt-1">Draf</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-3">
                            Permohonan yang belum dikirim kepada Dinas, dalam proses & revisi.
                        </h6>
                        <div class="table-responsive">
                            <table id="draftTable" class="table table-striped table-bordered w-100">
                                <thead align="center">
                                    <tr>
                                        <th>No</th>
                                        <th>Data</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header border-bottom title-part-padding">
                        <div class="d-flex justify-content-between align-content-center">
                            <h5 class="card-title mt-1">Arsip</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-3">
                            Permohonan yang sudah selesai atau terbit.
                        </h6>
                        <div class="table-responsive">
                            <table id="archiveTable" class="table table-striped table-bordered w-100">
                                <thead align="center">
                                    <tr>
                                        <th>No</th>
                                        <th>Data</th>
                                        <th>No. Surat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('sub-scripts')
    @include('components.datatables.config')
    <script>
        $('#draftTable').DataTable();
        $('#archiveTable').DataTable();
    </script>
@endpush
