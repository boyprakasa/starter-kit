<form id="formModal" action="{{ $user->exists ? route('admin.update', $user->id) : route('admin.store') }}"
    method="post" enctype="application/x-www-form-urlencoded" novalidate>
    <div class="modal-body">
        @if ($user->exists)
            @method('put')
        @endif
        <div class="form-group">
            <label for="" class="control-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            <span class="text-danger err_msg_name"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            <span class="text-danger err_msg_email"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control">
            <span class="text-danger err_msg_password"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" class="form-control">
            <span class="text-danger err_msg_password_confirmation"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success submit">Simpan</button>
    </div>
</form>
