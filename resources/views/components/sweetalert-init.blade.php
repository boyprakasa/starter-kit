<script type="text/javascript">
    // Global loading on ajax process
    $(document).bind('ajaxStart', function() {
        Swal.fire({
            title: 'Mohon tunggu',
            text: 'Sedang diproses...',
            onOpen: () => {
                Swal.showLoading()
            }
        });
    }).bind('ajaxStop', function() {
        setTimeout(() => {
            Swal.close();
        }, 1500);
    });

    function successAlert(title = null, text = null) {
        Swal.fire({
            type: 'success',
            title: title,
            text: text,
            showConfirmButton: false,
            timer: 1500
        });
    }

    function dangerAlert(title = null, text = null) {
        Swal.fire({
            type: 'error',
            title: title,
            text: text,
            showConfirmButton: false,
            timer: 1500
        });
    }

    function warningAlert(title = null, text = null, ajax = null) {
        Swal.fire({
            type: 'warning',
            title: title,
            text: text,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Setuju',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                ajax();
            }
        });
    }
</script>
