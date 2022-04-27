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

        $.ajax({
            type: "POST",
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
                console.log(result);
                dangerAlert('Gagal disimpan!');
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

        var url = $(this).attr('href');

        window.open(url);
    });
</script>
