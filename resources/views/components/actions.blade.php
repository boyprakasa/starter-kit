<script>
    // Modal
    $(document).on('click', '.showComponentModal', function(e) {
        e.preventDefault();

        var title = $(this).data('title');
        var url = $(this).data('url');
        var size = $(this).data('size');

        $.ajax({
            url: url,
            dataType: 'html',
            success: function(data) {
                console.log(data, title, size);
                $('.modal-title').text(title);
                $('.modal-item').html(data);
                $('.modal-dialog').addClass(size);
                $('.component-modal').modal('show');
            }
        });
    });

    $(document).on('click', '.submit', function(e) {
        e.preventDefault();

        var url = $('#formModal').attr('action');

        $('input').removeClass('is-invalid is-valid');
        $('textarea').removeClass('is-invalid is-valid');
        $('[class*=err_msg_]').text('');

        $.ajax({
            type: 'POST',
            url: url,
            data: new FormData($('#formModal')[0]),
            contentType: false,
            processData: false,
            success: function(result) {
                successAlert(result.message);
                $('.component-modal').modal('hide');
                $('#globaltable').DataTable().ajax.reload();
            },
            error: function(result) {
                dangerAlert('Gagal disimpan!');
                var errors = result.responseJSON.errors;
                $('input').addClass('is-valid');
                $('input[type=search]').removeClass('is-valid');
                $.each(errors, function(key, value) {
                    $('input[name=' + key + ']').addClass('is-invalid');
                    $('textarea[name=' + key + ']').addClass('is-invalid');
                    $('.err_msg_' + key).text(value);
                });
            }
        });
    });

    $(document).on('click', '.delete', function(e) {
        e.preventDefault();

        var url = $(this).data('url');

        warningAlert('Hapus Data?', 'Data yang terhapus tidak bisa dikembalikan!', function() {
            $.ajax({
                type: "DELETE",
                url: url,
                success: function(result) {
                    successAlert(result.message);
                    $('#globaltable').DataTable().ajax.reload();
                },
                error: function(result) {
                    console.log(result);
                    dangerAlert('Gagal dihapus!');
                }
            });
        });
    });

    $(document).on('click', '.download', function(e) {
        e.preventDefault();

        var url = $(this).data('url');
        // var size = $(this).data('size');

        // $('.modal-dialog').addClass(size);
        $('#pdf-iframe').html('<iframe src="' + url +
            '" style="width: 100%; height: 720px;" frameborder="0"></iframe>');
    });
</script>
