<form id="formModal"
    action="{{ $signature->exists ? route('signature.update', $signature->id) : route('signature.store') }}"
    method="post" enctype="application/x-www-form-urlencoded">
    <div class="modal-body">
        @if ($signature->exists)
            @method('PUT')
        @endif
        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="">Akun</label>
                    <select class="form-control select2" name="user_id"
                        @if ($signature->exists) disabled @endif>
                        <option value="" selected disabled>Silahkan Pilih</option>
                        @foreach ($users as $user)
                            <option @if ($user->id === $signature->user_id) selected @endif value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger err_msg_user_id"></span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control select2">
                        <option value="" selected disabled>Silahkan Pilih</option>
                        <option value="1" @if ($signature->status === 1) selected @endif>Aktif</option>
                        <option value="0" @if ($signature->status === 0) selected @endif>Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Jabatan Penanda Tangan</label>
                    <select class="form-control select2" name="position">
                        <option value="" selected disabled>Silahkan Pilih</option>
                        <option @if ($signature->position === 'Kepala Dinas') selected @endif value="Kepala Dinas">Kepala Dinas
                        </option>
                        <option @if ($signature->position === 'Kepala Bidang') selected @endif value="Kepala Bidang">Kepala Bidang
                        </option>
                    </select>
                    <span class="text-danger err_msg_position"></span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <input type="text" class="form-control" name="tier" placeholder="Jabatan"
                        value="{{ $signature->tier }}">
                    <span class="text-danger err_msg_tier"></span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Pangkat</label>
                    <input type="text" class="form-control" name="rank" placeholder="Pangkat"
                        value="{{ $signature->rank }}">
                    <span class="text-danger err_msg_rank"></span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Header</label>
                    <input type="text" class="form-control" name="header" placeholder="Header"
                        value="{{ $signature->header ?? old('header') }}" required>
                    <span class="text-danger err_msg_header"></span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Title 1</label>
                    <input type="text" class="form-control" name="title1"
                        value="{{ $signature->title1 ?? old('title1') }}" required>
                    <span class="text-danger err_msg_title1"></span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Title 2</label>
                    <input type="text" class="form-control" name="title2"
                        value="{{ $signature->title2 ?? old('title2') }}" required>
                    <span class="text-danger err_msg_title2"></span>
                </div>
            </div>

            <div class="col-lg-6">
                <label for="">Mulai</label>
                <input type="date" class="form-control" name="start_date"
                    value="{{ date('Y-m-d', strtotime($signature->start_date ?? date('Y-m-d'))) ?? old('start_date') }}">
                <span class="text-danger err_msg_start_date"></span>
            </div>

            <div class="col-lg-6">
                <label for="">Akhir</label>
                <input type="date" class="form-control" name="end_date"
                    value="{{ date('Y-m-d', strtotime($signature->end_date ?? date('Y-m-d'))) ?? old('end_date') }}">
                <span class="text-danger err_msg_end_date"></span>
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
