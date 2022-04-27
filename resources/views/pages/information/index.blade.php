@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom title-part-padding">
                        <div class="d-flex justify-content-between align-content-center">
                            <h5 class="card-title mt-1">Informasi</h5>
                            <button class="btn btn-sm btn-outline-success showComponentModal"
                                data-url="{{ route('informasi.create') }}" data-toggle="modal"
                                data-target=".component-modal" data-title="Tambah Informasi">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-3">
                            Changing the language information displayed by DataTables is as simple as
                            passing in a <code> language</code> object to the DataTable constructor.
                        </h6>
                        <div class="table-responsive">
                            <table id="globaltable" class="table table-striped table-bordered w-100">
                                <thead align="center">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
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
    @include('components.modals')
@endsection

@push('sub-scripts')
    @include('components.sweetalert-init')
    @include('components.datatables.config')
    @include('components.actions')
    <script>
        $('#globaltable').DataTable({
            ajax: "{{ route('informasi.datatable') }}",
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'title'
                },
                {
                    data: 'description'
                },
                {
                    data: 'action'
                }
            ]
        });
    </script>
@endpush
