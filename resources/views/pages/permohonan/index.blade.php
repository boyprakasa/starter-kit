@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 order-lg-0 order-0">
                {{-- Step 1 --}}
                <x-permohonan.layanan-form />

                @if (request()->routeIs('permohonan.third-view'))
                    <x-permohonan.riwayat-view />

                    <div class="hotreload">
                        <x-permohonan.persyaratan-form />
                    </div>
                    <button class="btn btn-success float-right upload-btn">
                        <i class="fa fa-upload"></i> Upload
                    </button>
                @endif
            </div>

            <div class="col-lg-8 order-lg-1 order-1">
                {{-- Step 2 --}}
                @if (request()->routeIs('permohonan.second-view'))
                    <x-permohonan.pemohon-form />
                @endif
                {{-- Step 3 --}}
                @if (request()->routeIs('permohonan.third-view') || request()->routeIs('permohonan.third-view-new'))
                    <x-permohonan.pemohon-view />
                @endif

                @if (request()->routeIs('permohonan.third-view') || request()->routeIs('permohonan.third-view-new'))
                    <x-permohonan.data-form />
                @endif
            </div>

            {{-- <div class="col-lg-4 order-lg-2 order-3"> --}}
            {{-- Step 4 --}}
            {{-- @if (request()->routeIs('permohonan.third-view'))
                    <x-permohonan.persyaratan-form />
                @endif --}}
            {{-- </div> --}}

            {{-- <div class="col-lg-8 order-lg-3 order-2"> --}}
            {{-- Step 3 --}}
            {{-- @if (request()->routeIs('permohonan.third-view') || request()->routeIs('permohonan.third-view-new'))
                    <x-permohonan.data-form />
                @endif --}}
            {{-- </div> --}}

            <div class="col-lg-12 order-lg-4 order-4">
                <x-permohonan.aggrement-form />
            </div>

        </div>
    </div>
@endsection

@push('sub-scripts')
    @include('components.sweetalert-init')
    <script>
        $('.select2').select2();


        function selectPdf(id) {
            $(`.InputPdf${id}`).click();
        }

        function selectFile(id) {
            if ($(`.InputPdf${id}`).val()) {
                var pdfName = $(`.InputPdf${id}`).val().replace(/C:\\fakepath\\/i, '');
                $(`.fileName${id}`).html(pdfName);
            } else {
                $(`.fileName${id}`).html('');
            }
        }

        $('.upload-btn').on('click', function(e) {
            e.preventDefault();

            var url = $('#uploadForm').attr('action');
            const form = $('#uploadForm')[0];

            $.ajax({
                type: 'POST',
                url: url,
                data: new FormData(form),
                contentType: false,
                processData: false,
                success: function(data) {
                    successAlert(data.message);
                    $(".hotreload").load(window.location.href + " .hotreload");
                },
                error: function(result) {
                    dangerAlert(data.message);
                }
            });
        });

        $(document).on('click', '.hapus-syarat', function(e) {
            e.preventDefault();

            if (confirm('Hapus syarat ?')) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('hapus-syarat', ':id') }}".replace(':id', this.id),
                    success: function(data) {
                        successAlert(data.message);
                    $(".hotreload").load(window.location.href + " .hotreload");
                    },
                    error: function(result) {
                        dangerAlert(data.message);
                    }
                });
            }

        });
    </script>
@endpush
