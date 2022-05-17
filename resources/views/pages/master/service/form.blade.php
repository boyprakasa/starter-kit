<form id="formModal" action="{{ $service->exists ? route('service.update', $service->id) : route('service.store') }}"
    method="post" enctype="application/x-www-form-urlencoded">
    <div class="modal-body">
        @if ($service->exists)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="" class="control-label">Kategori</label>
            <input type="text" name="category" class="form-control" value="{{ $service->category }}"
                @if ($service->exists) disabled @endif>
            <span class="text-danger err_msg_category"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Kode</label>
            <input type="text" name="code" class="form-control" value="{{ $service->code }}"
                @if ($service->exists) disabled @endif>
            <span class="text-danger err_msg_code"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $service->name }}">
            <span class="text-danger err_msg_name"></span>
        </div>
        {{-- <div class="form-group">
            <label for="" class="control-label">Model</label>
            <input type="text" name="model_type" class="form-control" placeholder="App\Models\....."
                value="{{ $service->model_type }}">
            <span class="text-danger err_msg_model_type"></span>
        </div> --}}
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success submit">Simpan</button>
    </div>
</form>
