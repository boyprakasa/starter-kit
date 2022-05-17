<form id="formModal"
    action="{{ $requirementsList->exists ? route('requirements-list.update', $requirementsList->id) : route('requirements-list.store') }}"
    method="post" enctype="application/x-www-form-urlencoded">
    <div class="modal-body">
        @if ($requirementsList->exists)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="" class="control-label">Layanan</label>
            <select class="form-control select2" name="service_id">
                <option value="">Silahkan Pilih</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" @if ($service->id === $requirementsList->service_id) selected @endif>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger err_msg_name"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Syarat</label>
            <select class="form-control select2" name="requirements_id">
                <option value="">Silahkan Pilih</option>
                @foreach ($requirements as $requirement)
                    <option value="{{ $requirement->id }}" @if ($requirement->id === $requirementsList->requirements_id) selected @endif>
                        {{ $requirement->name }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger err_msg_name"></span>
        </div>
        <div class="form-group">
            <label for="">Keperluan</label>
            <select class="form-control select2" name="need[]" multiple="multiple">
                <option {{ in_array('baru', json_decode(@$requirementsList->need) ?? []) ? 'selected' : '' }}
                    value="baru">Baru
                </option>
                <option {{ in_array('perpanjangan', json_decode(@$requirementsList->need) ?? []) ? 'selected' : '' }}
                    value="perpanjangan">Perpanjangan</option>
                <option {{ in_array('revisi', json_decode(@$requirementsList->need) ?? []) ? 'selected' : '' }}
                    value="revisi">
                    Revisi
                </option>
            </select>
            <span class="text-danger err_msg_need"></span>
        </div>
        <div class="form-group">
            <label for="">Upload oleh</label>
            <select class="form-control select2" name="upload_by">
                <option {{ $requirementsList->upload_by === 'pemohon' ? 'selected' : '' }} value="pemohon"> Pemohon
                </option>
                <option {{ $requirementsList->upload_by === 'internal' ? 'selected' : '' }} value="internal"> Internal
                </option>
                <option {{ $requirementsList->upload_by === 'semua' ? 'selected' : '' }} value="semua"> Semua
                </option>
            </select>
            <span class="text-danger err_msg_upload_by"></span>
        </div>

        <div class="row clearfix">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Ketentuan</label>
                    <select class="form-control select2" name="required">
                        <option {{ $requirementsList->required === 1 ? 'selected' : '' }} value="1">Wajib
                        </option>
                        <option {{ $requirementsList->required === 0 ? 'selected' : '' }} value="0">Tidak
                            Wajib</option>
                    </select>
                    <span class="required_err"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control select2" name="status">
                        <option {{ $requirementsList->status === 1 ? 'selected' : '' }} value="1">
                            Aktif</option>
                        <option {{ $requirementsList->status === 0 ? 'selected' : '' }} value="0">
                            Tidak Aktif</option>
                    </select>
                    <span class="status_err"></span>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success submit">Simpan</button>
    </div>
</form>
<script>
    $('.select2').select2();
</script>
