<form id="formModal"
    action="{{ $download->exists ? route('download.update', $download->id) : route('download.store') }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        @if ($download->exists)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="" class="control-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $download->title }}">
            <span class="text-danger err_msg_title"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Keterangan</label>
            <textarea name="description" class="form-control">{{ $download->description }}</textarea>
            <span class="text-danger err_msg_description"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">File <em class="text-danger">*Max 10MB</em></label>
            <input type="file" name="file" class="form-control" accept="application/pdf">
            <span class="text-danger err_msg_file"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success submit">Simpan</button>
    </div>
</form>
