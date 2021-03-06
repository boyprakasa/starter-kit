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
            <label for="" class="control-label">NIK</label>
            <input type="text" name="identity_number" class="form-control"
                value="{{ $user->memberProfile->identity_number }}">
            <span class="text-danger err_msg_identity_number"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            <span class="text-danger err_msg_email"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">No. Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->memberProfile->phone }}">
            <span class="text-danger err_msg_phone"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Jenis Kelamin</label>
            <select name="gender" class="form-control select2">
                <option value="L" @if ($user->memberProfile->gender === 'L') selected @endif>Laki-laki</option>
                <option value="P" @if ($user->memberProfile->gender === 'P') selected @endif>Perempuan</option>
            </select>
            <span class="text-danger err_msg_gender"></span>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Status</label>
            <select name="status" class="form-control select2">
                <option value="active" @if ($user->status === 'active') selected @endif>Aktif</option>
                <option value="inactive" @if ($user->status === 'inactive') selected @endif>Tidak Aktif</option>
                <option value="suspend" @if ($user->status === 'suspend') selected @endif>Blokir</option>
            </select>
            <span class="text-danger err_msg_status"></span>
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
<script>
    $('.select2').select2();
</script>
