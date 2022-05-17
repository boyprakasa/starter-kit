<form id="formModal"
    action="{{ $requirements->exists ? route('requirements.update', $requirements->id) : route('requirements.store') }}"
    method="post" enctype="application/x-www-form-urlencoded">
    <div class="modal-body">
        @if ($requirements->exists)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="" class="control-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $requirements->name }}">
            <span class="text-danger err_msg_name"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ $requirements->description }}</textarea>
            <span class="text-danger err_msg_description"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success submit">Simpan</button>
    </div>
</form>
