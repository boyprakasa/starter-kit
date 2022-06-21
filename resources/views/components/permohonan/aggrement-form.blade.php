<form id="aggrement-submit" action="" class="card d-none">
    <div class="card-header bg-primary text-white rounded">Konfirmasi</div>
    <div class="card-body">
        <input type="hidden" name="service" value="{{ request()->service->model_type }}">
        <input type="hidden" name="id" value="{{ request()->id }}">
        <center>
            <b class="aggrement-before-submit">
                Berdasarkan data dan dokumen elektonik yang kami sampaikan adalah benar dan dapat
                dipertanggungjawabkan secara hukum.
            </b>
            <b class="aggrement-after-submit d-none">
                Permohonan sedang diproses!
            </b>
        </center>
    </div>
    <div class="card-footer">
        <center>
            <div class="aggrement-before-submit">
                <input type="checkbox" name="aggrement" id="aggrement-form">
                <label for="aggrement-form">Untuk itu kami setuju untuk melanjutkan
                    proses.</label>
            </div>
            <button class="btn btn-success aggrement-before-submit checklist-aggrement d-none">
                <i class="fas fa-hands-helping"></i> Proses
            </button>
            <button class="btn btn-danger">
                <i class="fa fa-times"></i> Tutup
            </button>
        </center>
    </div>
</form>

@push('sub-scripts')
    @include('components.sweetalert-init')
    <script>
        $('#aggrement-form').on('change', function() {
            if ($(this).is(':checked')) {
                $('.checklist-aggrement').removeClass('d-none');
            } else {
                $('.checklist-aggrement').addClass('d-none');
            }
        });

        if (parseInt("{{ $izin->flow }}") > 0) {
            hideAfterSubmit();
        }

        function hideAfterSubmit() {
            // Jika berkas di internal
            $('.aggrement-before-submit').addClass('d-none');
            $('.aggrement-after-submit').removeClass('d-none');
        }

        $('#aggrement-submit').on('submit', function(e) {
            e.preventDefault();

            var url = "{{ route('permohonan.submit') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    successAlert('Berhasil berhasil dikirim!', 'Silahkan tunggu proses selanjutnya.');
                    hideAfterSubmit();
                },
                error: function(response) {
                    console.log(response);
                    dangerAlert('Gagal dikirim!', 'Silahkan muat ulang halaman lalu coba lagi.');
                }
            });
        });
    </script>
@endpush
