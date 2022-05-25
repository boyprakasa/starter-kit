<form action="{{ route('permohonan.first-submit') }}" method="POST" enctype="application/x-www-form-urlencoded"
    class="card">
    @csrf
    <div class="card-header bg-cyan text-white rounded">Pilih Layanan</div>
    <div class="card-body">
        <div class="form-group">
            <label class="control-label">Layanan</label>
            <select name="service" class="form-control select2" style="width: 100%">
                <option value="">Silahkan Pilih</option>
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
                    <option value="{{ $applicant->id }}">
                        {{ $applicant->jns_perusahaan === '1' ? $applicant->nama : $applicant->nm_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    @if (request()->routeIs('permohonan.first-view'))
        <div class="card-footer">
            <button class="btn btn-success float-right">
                <i class="fa fa-arrow-right"></i> Lanjut
            </button>
        </div>
    @endif
</form>
