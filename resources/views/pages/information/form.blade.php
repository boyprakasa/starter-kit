<form id="formModal"
    action="{{ $information->exists ? route('informasi.update', $information->id) : route('informasi.store') }}"
    method="post" enctype="application/x-www-form-urlencoded">
    <div class="modal-body">
        @if ($information->exists)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="" class="control-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $information->title }}">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Isi Informasi</label>
            <textarea name="description" class="form-control">{{ $information->description }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success submit">Simpan</button>
    </div>
</form>
