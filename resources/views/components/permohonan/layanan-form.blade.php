<form id="layananForm" action="{{ route('permohonan.first-submit') }}" method="POST"
    enctype="application/x-www-form-urlencoded" class="card">
    <div class="card-header bg-cyan text-white rounded">Pilih Layanan</div>
    <div class="card-body">
        <div class="form-group">
            <label class="control-label">Layanan</label>
            <select name="service" class="form-control select2" style="width: 100%">
                <option value="" selected disabled>Silahkan Pilih</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" @if (optional(request('service'))->id == '1') selected @endif>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Pemohon</label>
            <select name="applicant" class="form-control select2" style="width: 100%">
                <option value="">Silahkan Pilih (Jika Ada)</option>
                @foreach ($applicants as $applicant)
                    <option value="{{ $applicant->id }}" @if (optional(request()->applicant)->id === $applicant->id) selected @endif>
                        {{ $applicant->jns_pemohon === '1' ? $applicant->nama : $applicant->nm_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    @if (request()->routeIs('permohonan.first-view'))
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right">
                <i class="fa fa-arrow-right"></i> Lanjut
            </button>
        </div>
    @endif
</form>

@push('sub-scripts')
    @include('components.sweetalert-init')
    <script>
        $('.select2').select2();

        $('#layananForm').on('submit', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(result) {
                    successAlert('Berhasil!', result.message);
                    window.location.href = result.url;
                },
                error: function(result) {
                    dangerAlert('Gagal!', 'Silahkan Pilih Layanan!');
                }
            });
        });
    </script>
@endpush
