<script src="/xa/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/xa/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/xa/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/xa/dist/js/app.min.js"></script>
<script src="/xa/dist/js/app.init.js"></script>
<script src="/xa/dist/js/app-style-switcher.js"></script>
<script src="/xa/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="/xa/dist/js/waves.js"></script>
<script src="/xa/dist/js/sidebarmenu.js"></script>
<script src="/xa/dist/js/feather.min.js"></script>
<script src="/xa/dist/js/custom.min.js"></script>

<script src="/xa/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/xa/assets/extra-libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="/xa/assets/libs/sweetalert2/dist/sweetalert2.all.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
</script>
